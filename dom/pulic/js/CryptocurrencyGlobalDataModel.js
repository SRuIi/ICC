/**
 * Created by chendou on 2017/7/31.
 * 全球加密货币数据
 */
//alert(_self.formatMoney(_self.get('total24hVolumeCny')));
var CryptocurrencyGlobalDataModel = Backbone.Model.extend({
    initializa:function(){
        this.updateData();
    },
    defaults:{
        el:'#globalData',
        totalMarketCapUsd:0,//全球货币市值（USD）
        totalMarketCapCny:0,//全球货币市值（CNY）
        total24hVolumeUsd:0,//24小时交易总额，单位：美元
        total24hVolumeCny:0,//24小时交易总额，单位：元
        bitcoinPercentageOfMarketCap:0,//比特币占虚拟币总市值比例
        activeCurrencies:0,//当前活跃货币
        activeAssents:0,//当前有投资价值货币数量
        activeMarkets:0//当前活跃的交易市场
    },
    updateData:function() {
        var _self = this;
        $.post("http://6btc.com/coinmarketcap/globalData",function(data, status) {
            if (data != null && data != undefined) {
                _self.set(data);
                _self.render();
            }
        })
    },
    render:function() {
        var _self = this;
        var $el = $(_self.get('el'));
        var htmls = [];
        htmls.push('<span>');
        htmls.push('区块链资产总：');
        htmls.push(_self.formatMoney(_self.get('totalMarketCapCny')));
        htmls.push('</span>');

        htmls.push('<span>');
        htmls.push('区块链资产24小时总交易量：');
        htmls.push(_self.formatMoney(_self.get('total24hVolumeCny')));
        htmls.push('</span>');

        htmls.push('<span>');
        htmls.push('比特币市值占比：');
        htmls.push('<strong style="color:rgb(57, 128, 195)">');
        htmls.push(_self.get('bitcoinPercentageOfMarketCap').toFixed(2));
        htmls.push('%</strong>');
        htmls.push('</span>');
        $el.empty();
        $el.append(htmls.join(""));
    },
    formatMoney:function(val) {
        var html = '<strong style="color:rgb(57, 128, 195)">';
        var unit = "";
        if (val >= 1000000000) {
            val = val.div(100000000);
            unit = "亿";
        } else if (val >= 100000) {
            val = val.div(10000);
            unit = "万";
        }
        html += val.toFixed(3);
        html += '</strong>&nbsp;';
        html += unit;
        html += '&nbsp;&nbsp;&nbsp;';
        return html;
    }

});
var model = new CryptocurrencyGlobalDataModel();