/**
 * Created by chendou on 2017/8/2.
 * BTCINFO 首页视图
 */

var BtcinfoIndexView = Backbone.View.extend({
    id: "#mainView",
    options: {},
    events: {
        'click div.menu-normal': 'menusClick'
    },
    initialize: function () {//初始化
        var _self = this;
        self.options = {};
        var crptoCurrencycollections = new CryptocurrencyCollection();
        var globalData = new CryptocurrencyGlobalDataModel();
        _self.setModels(crptoCurrencycollections);
        _self.listenToOnce(crptoCurrencycollections, "loadData", function () {
            crptoCurrencycollections.each(function (model, index, collections) {
                _self.listenTo(model, "change:percentChange24h", function (model, val) {
                    var preVal = model.previous('percentChange24h');
                    if (preVal > val) {
                        _self.addChangeData(model.id, 'percentChange24h', false);
                    } else if (preVal < val) {
                        _self.addChangeData(model.id, 'percentChange24h', true);
                    }
                });
                _self.listenTo(model, "change:priceCny", function (model, val) {
                    var preVal = model.previous('priceCny');
                    if (preVal > val) {
                        _self.addChangeData(model.id, 'priceCny', false);
                    } else if (preVal < val) {
                        _self.addChangeData(model.id, 'priceCny', true);
                    }
                });
                _self.listenTo(model, "change:priceBtc", function (model, val) {
                    var preVal = model.previous('priceBtc');
                    if (preVal > val) {
                        _self.addChangeData(model.id, 'priceBtc', false);
                    } else if (preVal < val) {
                        _self.addChangeData(model.id, 'priceBtc', true);
                    }
                });
            });
            var rows = [];
            crptoCurrencycollections.each(function (model, index, collections) {
                rows.push(model.attributes);
            });
            $("#cryptocurrency-trade-coinmarket").bootstrapTable('load', rows);
            //初始化自定义搜索框
            initCustomerSearch(_self.getBootStrapTable(), ".cryptocurrency-search input");
            setInterval(function () {
                crptoCurrencycollections.fetchChangeData();
                globalData.updateData();
            }, 20000);
        });
        _self.listenTo(crptoCurrencycollections, 'loadChangeData', function () {
            // console.log("重新加载数据");
            var rows = [];
            crptoCurrencycollections.each(function (model, index, collections) {
                rows.push(model.attributes);
            });
            $("#cryptocurrency-trade-coinmarket").bootstrapTable('load', rows);
            var changeDatas = _self.getChangeData();
            for (var id in changeDatas) {
                _self.animationUpOrDown(id, changeDatas[id])
            }
            _self.clearChangeData();
        })
        globalData.updateData();
        crptoCurrencycollections.fetchAll();
        $("#cryptocurrency-trade-coinmarket").bootstrapTable(bootStrapTableOptions);
        $("#cryptocurrency-trade-coinmarket").bootstrapTable('load', fPageData);
        _self.setBootStrapTable($("#cryptocurrency-trade-coinmarket").data('bootstrap.table'));
        _self.initModalEvent();
        $("#sendPhoneCheckSmsBtn").on('click', _self.sendPhoneCheckSms);
    },
    getTableData: function (cryptocurrencyId) {
        var data = $("#cryptocurrency-trade-coinmarket").bootstrapTable('getRowByUniqueId', cryptocurrencyId);
        if (!$.isEmptyObject(data)) {
            return data;
        }
        return null;
    },
    setModels: function (models) {
        var _self = this;
        _self.options.models = models;
    },
    getModels: function () {
        return this.options.models;
    },
    setBootStrapTable: function (table) {
        var _self = this;
        _self.options.table = table;
    },
    getBootStrapTable: function () {
        var _self = this;
        return _self.options.table;
    },
    addChangeData: function (id, name, up) {
        var _self = this;
        if (!_self.options.changeData) {
            _self.options.changeData = {};
        }
        var data = _self.options.changeData[id] == null ? {} : _self.options.changeData[id];
        data[name] = up;
        _self.options.changeData[id] = data;
    },
    clearChangeData: function () {
        var _self = this;
        _self.options.changeData = {};
    },
    getChangeData: function () {
        var _self = this;
        return _self.options.changeData;
    },
    animationUpOrDown: function (id, model) {
        var $el = $('tr[data-uniqueid=' + id + ']');
        if (!$el.length) {
            return;
        }
        for (var key in model) {
            $el.find('.' + key).removeClass('riseUp dropDown');
            if (model[key]) {
                $el.find('.' + key).addClass('riseUp');
            } else {
                $el.find('.' + key).addClass('dropDown');
            }
        }
    },
    menusClick: function (event) {
        $('.menu-normal').removeClass('selected');
        $(event.target).addClass('selected');
    },
    initModalEvent: function () {//初始化模态框事件
        var _self = this;
        //添加或者更新广告投放信息模态框
        $('#monitroPriceModal').on('show.bs.modal', function (event) {
            //触发事件的目标元素
            var $button = $(event.relatedTarget);
            //触发事件类型，add/edit
            var cryptocurrencyData = _self.getTableData($button.data('rec-id'));
            _self.reSetMonitorPriceModal(cryptocurrencyData);
            $('#monitroPriceModal').data("cryptocurrencyData", cryptocurrencyData);
            $("a[href='#monitorPriceParamPanel']").tab('show');
        });
        //校验手机号面板显示
        $('#checkPhonePanelLi').on('show.bs.tab', function (event) {
            _self.switchCheckPhone();
            var $modal = $("#checkPhonePanel");
            var $checkPhoneNum = $modal.find(".phoneNumInput");
            $checkPhoneNum.val( $("#receiveSmsPhone").val())
        });
        //校验手机号面板消失
        $('#checkPhonePanelLi').on('hide.bs.tab', function (event) {
            _self.tabPreviousBtn();
        });

        $("a[name=btn_previous]").on('click', function() {
            $("a[href='#monitorPriceParamPanel']").tab('show');
        })

        $("a[name=btn_submit]").on('click', function() {
            _self.monitorPriceBtn();
        })
        var cookie_phone = getCookie('monitor_phone');
        if (!$.isEmptyObject(cookie_phone)) {
            if (checkSubmitMobil(cookie_phone)) {
                $("#receiveSmsPhone").val(cookie_phone);
            } else {
                setCookie('monitor_phone', "10086", "1s");
            }
        }

    },
    reSetMonitorPriceModal: function (data) {
        var _self = window.btcIndexView;
        //清除设置数据
        $("#cnyPriceCheckBox").prop("checked", true);
        $("#btcPriceCheckBox").prop("checked", false);
        $("#cnyPriceUpperLimitVal").val("");
        $("#cnyPriceFloorLimitVal").val("");
        $("#btcPriceUpperLimitVal").val("");
        $("#btcPriceFloorLimitVal").val("");
        $(".phoneCheckSmsCode").val("");
        if (data.id == "bitcoin") {
            $(".btc_price_div").addClass("hidden");
        } else {
            $(".btc_price_div").removeClass("hidden");
        }
        var cHtml = "";
        if (data['nameZh'] == null || data['nameZh'].length < 1) {
            cHtml += data['nameEN']
        } else {
            cHtml += data['nameZh']
        }
        cHtml += "-" + formatDetailPrice(data['priceCny']);
        cHtml += "&nbsp;&nbsp;&nbsp;&nbsp;";
        cHtml += formatDetailPriceBtc(data['priceBtc']);
        //设置虚拟币价格数据
        $("#cryptoCurrencyPriceInfo").html(cHtml);
    },
    monitorPriceBtn: function () {
        var me = window.btcIndexView;
        var $modal = $("#monitroPriceModal");
        //短信校验页面提交
        if ($("a[href='#checkPhonePanel']").parent().hasClass('active')) {
            var smsCode = $('.phoneCheckSmsCode').val();
            if (typeof smsCode == 'undefined' || smsCode.length < 1) {
                $('.phoneCheckSmsCode').focus();
                showErrTip("请输入短信验证码");
                return;
            }
            me.setPriceMonitorParams({
                cryptocurrencyId: $modal.data("cryptocurrencyData")['id'],
                code: smsCode
            });
        } else {
            var me = window.btcIndexView;
            me.setPriceMonitorParams({
                cryptocurrencyId: $modal.data("cryptocurrencyData")['id']
            })
        }
    },
    sendPhoneCheckSms: function (event) {
        if (countDown > 0) {
            return;
        }
        var $modal = $("#checkPhonePanel");
        var $checkPhoneNum = $modal.find(".phoneNumInput");
        //校验手机号码
        if (!checkSubmitMobil($checkPhoneNum.val())) {
            $checkPhoneNum.focus();
            showErrTip("请输入正确手机号码");
            return;
        }
        smsLimitCountDown($(event.target));
        //发送手机验证码
        $.post("/sms/sendPhoneCode", {phone: $checkPhoneNum.val()}, function (data) {
            if (data.code == 200) {
                $("#receiveSmsPhone").val($checkPhoneNum.val());
                showSuccessTip("发送成功，请注意查收");
                return;
            }
            showErrTip(data.msg);
        });
    },
    tabPreviousBtn: function () {//上一步点击事件
        $('a[name=btn_previous]').addClass("disabled");
        $('div.progress-bar').width('10%');
    },
    switchCheckPhone: function () {
        $('a[name=btn_previous]').removeClass("disabled");
        $('div.progress-bar').width('90%');
    },
    setPriceMonitorParams: function (priceMonitorParamJson) {
        var me = window.btcIndexView;
        var $modal = $("#monitroPriceModal");
        //校验参数
        //校验手机号码
        if (!checkSubmitMobil($("#receiveSmsPhone").val())) {
            $("#receiveSmsPhone").focus();
            showErrTip("请输入正确手机号码");
            return;
        }
        priceMonitorParamJson['phone'] = $("#receiveSmsPhone").val();
        //校验监控价格参数
        var $checkBoxs = $("input[name=priceUnit]:checked");
        if ($checkBoxs.length < 1) {
            showErrTip("请选择监控价格单位");
            return;
        }

        var $btcCheckBox = $("input[name=priceUnit][value=BTC]:checked");
        var $cnyCheckBox = $("input[name=priceUnit][value=CNY]:checked");
        if ($btcCheckBox.length < 1 && $cnyCheckBox.length < 1) {
            showErrTip("请勾选需要监控的价格单位");
            return;
        }
        var priceLimit = {}
        //解析并校验btc参数
        if ($btcCheckBox.length > 0) {
            var res = me.parsePriceMonitorParam($("#btcPriceUpperLimitVal").val(), $("#btcPriceFloorLimitVal").val(), $modal.data("cryptocurrencyData")['priceBtc']);
            if (res == -1) {
                return;
            }
            if (res == 1) {
                if ($.isNumeric($("#btcPriceUpperLimitVal").val())) {
                    priceLimit['priceBtcUpperLimit'] = parseFloat($("#btcPriceUpperLimitVal").val());
                }
                if ($.isNumeric($("#btcPriceFloorLimitVal").val())) {
                    priceLimit['priceBtcFloorLimit'] = parseFloat($("#btcPriceFloorLimitVal").val());
                }
            }
        }
        //解析并校验人民币参数
        if ($cnyCheckBox.length > 0) {
            var res = me.parsePriceMonitorParam($("#cnyPriceUpperLimitVal").val(), $("#cnyPriceFloorLimitVal").val(), $modal.data("cryptocurrencyData")['priceCny']);
            if (res == -1) {
                return;
            }
            if (res == 1) {
                if ($.isNumeric($("#cnyPriceUpperLimitVal").val())) {
                    priceLimit['priceCnyUpperLimit'] = parseFloat($("#cnyPriceUpperLimitVal").val());
                }
                if ($.isNumeric($("#cnyPriceFloorLimitVal").val())) {
                    priceLimit['priceCnyFloorLimit'] = parseFloat($("#cnyPriceFloorLimitVal").val());
                }
            }
        }
        if ($.isEmptyObject(priceLimit)) {
            showErrTip("请先设置监控价格");
            return;
        }
        $.extend(priceMonitorParamJson, priceLimit);
        //ajax请求设置
        $.ajax({
            url: "http://www.6btc.com/monitor/price/cryptocurrency",
            method: "post",
            contentType: "application/json",
            data: JSON.stringify(priceMonitorParamJson),
            dataType: "json",
            success: function (data) {
                //602验证手机号码
                if (data.code == 602) {
                    $("a[href='#checkPhonePanel']").tab('show');
                    return;
                }
                if (data.code == 200) {
                    setCookie("monitor_phone", priceMonitorParamJson.phone, "200d");
                    showSuccessTip("价格监控设置成功");
                    $("#monitroPriceModal").modal("hide");
                    return;
                }
                showErrTip(data.msg);
            },
            error: function () {
                showErrTip("网络请求失败，请稍候再试");
            }
        });
    },
    parsePriceMonitorParam: function (upperLimit, floorLimit, price) {
        var upperPrice = null;
        var floorPrice = null;
        if (typeof upperLimit != 'undefined' && upperLimit.length > 0) {
            if (!$.isNumeric(upperLimit)) {
                showErrTip("请输入数字");
                return -1;
            }
            upperPrice = parseFloat(upperLimit);
            if (upperPrice <= price) {
                showErrTip("价格上限要大于当前价格");
                return -1;
            }
        }
        if (typeof floorLimit != 'undefined' && floorLimit.length > 0) {
            if (!$.isNumeric(floorLimit)) {
                showErrTip("请输入数字");
                return -1;
            }
            floorPrice = parseFloat(floorLimit);
            if (floorPrice >= price) {
                showErrTip("价格下限要小于当前价格");
                return -1;
            }
            if (floorPrice <= 0) {
                showErrTip("价格下限要大于0");
                return -1;
            }
        }
        //判断价格上限和价格下限是否设置正确
        if (upperPrice != null && floorPrice != null) {
            if (upperPrice < floorPrice) {
                showErrTip("价格上限要大于价格下限");
                return -1;
            }
        }
        if (typeof floorLimit != 'undefined' && typeof floorPrice != 'undefined') {
            return 1;
        }
        return 0;
    }
});


var countDown = 0;
var countDownFn = 0;
var smsLimitCountDown = function ($smsSendBtn) {
    clearInterval(countDownFn); // Preventive clearInterval
    countDown = 120;
    countDownFn = setInterval(function () {
        if (countDown == 0) {
            resetSmsCodeSendBtn($smsSendBtn);
            return;
        }
        var val = "发送(" + countDown + " s)";
        $smsSendBtn.text(val);
        countDown--;
    }, 1000);
}
var resetSmsCodeSendBtn = function ($smsSendBtn) {
    clearInterval(countDownFn); // Preventive clearInterval
    countDown = 0;
    $smsSendBtn.text("发送短信");
}


jQuery(document).ready(function ($) {
    window.btcIndexView = new BtcinfoIndexView();

    $("#rightButton").css("right", "0px");

    var button_toggle = true;
    $(".right_ico").on("mouseover", function () {
        var tip_top;
        var show = $(this).attr('show');
        var hide = $(this).attr('hide');
        tip_top = show == 'tel' ? 65 : -10;
        button_toggle = false;
        $("#right_tip").css("top", tip_top).show().find(".flag_" + show).show();
        $(".flag_" + hide).hide();

    }).on("mouseout", function () {
        button_toggle = true;
        hideRightTip();
    });


    $("#right_tip").on("mouseover", function () {
        button_toggle = false;
        $(this).show();
    }).on("mouseout", function () {
        button_toggle = true;
        hideRightTip();
    });

    function hideRightTip() {
        setTimeout(function () {
            if (button_toggle) $("#right_tip").hide();
        }, 500);
    }

    $("#backToTop").on("click", function () {
        var _this = $(this);
        $('html,body').animate({scrollTop: 0}, 500, function () {
            _this.hide();
        });
    });

    $(window).scroll(function () {
        var htmlTop = $(document).scrollTop();
        if (htmlTop > 0) {
            $("#backToTop").fadeIn();
        } else {
            $("#backToTop").fadeOut();
        }
    });

    //去除bootstrap table固定高度
    $(".fixed-table-body").removeClass('fixed-table-body');
    $.notifySetup({sound: "https://btcinfo-media.oss-cn-hangzhou.aliyuncs.com/notify.wav"});
})


//币种列表
var initCustomerSearch = function ($bootStrapTable, el) {
    var that = $bootStrapTable;
    var $search = $(el);
    var timeoutId = 0;
    $search.off('keyup drop blur').on('keyup drop blur', function (event) {
        if (that.options.searchOnEnterKey && event.keyCode !== 13) {
            return;
        }

        if ($.inArray(event.keyCode, [37, 38, 39, 40]) > -1) {
            return;
        }
        clearTimeout(timeoutId); // doesn't matter if it's 0
        timeoutId = setTimeout(function () {
            that.onSearch(event);
        }, 100 || that.options.searchTimeOut);
    });
    $search.keyup();
}


//bootstrap table 配置
var bootStrapTableOptions = {
    url: "",
    method: "",
    uniqueId: "id",//主键
    pagination: true,// 是否显示分页
    search: true,
    pageNumber: 1,//初始化加载第一页，默认第一页
    pageSize: 100,//每页的记录行数（*）
    //pageList: [50, 100],//可供选择的每页的行数（*）
    pageList: [50, 100],//可供选择的每页的行数（*）
    queryParamsType: "limit",
    classes: "table-no-bordered table-border",
    rowStyle: function (row, index) {
        return {
            css: {
                "border-top": "1px solid #ddd",
                "height": "45px",
                "color": "#4c4949",
                "font-weight": 400,
                "cursor": "pointer"
            },
            class: "table-row-td"
        };
    },
    rowAttributes: function (row, index) {
        return {
            class: "table-row-td-floatShadowHover"
        };
    },
    columns: [{
        field: 'rank',
        title: '市值',
        align: 'center',
        class: "table-border-th rank",
        width: 75,
        sortable: true
    }, {
        field: 'id',
        title: '名称',
        align: 'left',
        class: "table-border-th id",
        width: 200,
        formatter: function (data, row, index) {
            var eleHTML = "<div style='width: 100%'>";
            eleHTML += "<div style='display: inline-block;width: 40px;padding-left: 8px;'>";
            eleHTML += '<img src="https://bitinfo-pic-16-16.oss-cn-hangzhou.aliyuncs.com/' + data + '.png" class="currency-logo" alt="' + data + '"/>';
            eleHTML += "</div>";
            eleHTML += "<div style='display: inline-block;width: 160px;text-align: left;color: #3980c3;font-weight: 400;'>";
            eleHTML += "<a href='/cryptocurrency#search/" + row['id'] + "' target='_blank'>";
            var names = formatterText(15, 120, row['nameEN'], row['nameZh']);
            eleHTML += "<span style='display: inline-block;' title='" + row['nameEN'] + "'>" + names[0];
            eleHTML += "</span>";
            if (row['nameZh'] != undefined) {
                eleHTML += "<span style='display: inline-block;' title='" + row['nameZh'] + "'>&nbsp;&nbsp;" + names[1] + "</span>";
            }
            eleHTML += "</a>";
            eleHTML += "</div>";
            eleHTML += "</div>";
            return eleHTML;
        },
        searchFormatter: false
    }, {
        field: 'symbol',
        title: '缩写',
        class: "table-border-th symbol",
        align: 'left',
        width: 90,
        formatter: function (data) {
            var eleHTML = "<div style='width: 100%; padding-left: 8px;'>";
            eleHTML += (data != null && data != undefined) ? data.toUpperCase() : "-";
            eleHTML += "</div>";
            return eleHTML;
        },
        searchFormatter: false
    }, {
        field: 'priceBtc',
        title: '价格(BTC)',
        class: "table-border-th priceBtc",
        align: 'left',
        sortable: true,
        width: 130,
        formatter: formatterBTC,
        searchFormatter: false,
        searchable: false
    }, {
        field: 'priceCny',
        title: '价格(CNY)',
        class: "table-border-th priceCny",
        align: 'left',
        sortable: true,
        width: 140,
        formatter: formatterPrice,
        searchFormatter: false,
        searchable: false
    }, {
        field: 'volumeCny24h',
        title: '日成交量',
        class: "table-border-th volumeCny24h",
        align: 'left',
        sortable: true,
        width: 130,
        formatter: formatterPriceWithUnit,
        searchFormatter: false,
        searchable: false
    }, {
        field: 'totalSupply',
        title: '流通总量',
        class: "table-border-th totalSupply",
        align: 'left',
        sortable: true,
        formatter: function (res) {
            if (res == null) {
                return "<div style='width:100%;text-align:left;padding-left: 8px;'>-</div>";
            }
            var eleHtml = "<div style='width:100%;text-align:left;padding-left: 8px;'>";
            // eleHtml += "<span style='display: inline-block;width: 20%;text-align: center;'></span>";
            if (res >= 1000000000) {
                res = res.div(100000000);
                eleHtml += "<span style='display: inline-block;text-align: left;''>" + res.toFixed(0) + "&nbsp;亿</span>";
            } else if (res >= 100000) {
                res = res.div(10000);
                eleHtml += "<span style='display: inline-block;text-align: left;'>" + res.toFixed(0) + "&nbsp;万</span>";
            } else {
                eleHtml += "<span style='display: inline-block;text-align: left;'>" + res.toFixed(0) + "</span>";
            }
            eleHtml += "</div>";
            return eleHtml;
        },
        searchFormatter: false,
        searchable: false,
        visible: false
    }, {
        field: 'marketCapCny',
        title: '流通市值',
        class: "table-border-th marketCapCny",
        align: 'left',
        sortable: true,
        formatter: formatterPriceWithUnit,
        searchFormatter: false,
        searchable: false
    }, {
        field: 'percentChange24h',
        title: '日涨幅',
        class: "table-border-th percentChange24h",
        align: 'left',
        sortable: true,
        width: 85,
        formatter: formatterPercentChangeWithoutArrows,
        searchFormatter: false,
        searchable: false
    }, {
        field: 'percentChange7d',
        title: '7日涨幅',
        class: "table-border-th percentChange7d",
        align: 'left',
        sortable: true,
        width: 80,
        formatter: formatterPercentChangeWithoutArrows,
        searchFormatter: false,
        searchable: false
    }, {
        field: 'id',
        title: '价格监控',
        class: "table-border-th percentChange7d",
        align: 'center',
        sortable: true,
        width: 80,
        searchFormatter: false,
        searchable: false,
        formatter: function (data, row, index) {
            return "<a class='btn btn-primary btn-conf' data-toggle='modal' data-rec-id = '" + data + "' data-target='#monitroPriceModal'>设置</a>";
        }
    }]
}


function formatDetailPrice(price) {
    if (price == null) {
        return "-";
    }
    var eleHtml = "¥&nbsp;";
    if (price >= 1) {
        eleHtml += price.toFixed(2);
    } else {
        eleHtml += price.toFixed(8);
    }
    return eleHtml;
}

function formatDetailPriceUsd(price) {
    if (price == null) {
        return "-";
    }
    var eleHtml = "$&nbsp;";
    if (price >= 1) {
        eleHtml += price.toFixed(2);
    } else {
        eleHtml += price.toFixed(8);
    }
    return eleHtml;
}

function formatDetailPriceBtc(price) {
    if (price == null) {
        return "-";
    }
    var eleHtml = "<i class='fa fa-bitcoin'></i>&nbsp;";
    if (price >= 1) {
        eleHtml += price.toFixed(2);
    } else {
        eleHtml += price.toFixed(8);
    }
    return eleHtml;
}
