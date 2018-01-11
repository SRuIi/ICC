/**
 * Created by chendou on 2017/7/31.
 * 加密货币模型信息
 */

var CryptocurrencyModel = Backbone.Model.extend({
    defaults: {
        availableSupply: null,//流通总量
        id: null,//币种id
        lastUpdatedAt: null,//最后更新时间
        marketCapCny: null,//市值（CNY）
        marketCapUsd: null,//市值（USD）
        nameEN: null,//币种英文名称
        nameZh: null,//币种中文名称
        percentChange1h: null,//1小时内涨跌幅
        percentChange7d: null,//7天内涨跌幅
        percentChange24h: null,//24小时内涨跌幅
        priceBtc: null,//价格（BTC）
        priceCny: null,//价格（人民币）
        priceUsd: null,//价格（USD）
        rank: null,//市值排名
        symbol: null,//货币缩写
        totalSupply: null,//当前可用总量
        volumeCny24h: null,//24小时内容交易金额(CNY)
        volumeUsd24h: null,//24小时内容交易金额(USD)
    }
});

//币种信息集合
var CryptocurrencyCollection = Backbone.Collection.extend({
    model: CryptocurrencyModel,
    initialize: function () {
        var _self = this;
    },
    fetchAll: function () {
        var _self = this;
        $.post("http://6btc.com/coinmarketcap/crycurrencies", function (data, status) {
            if (data != null && data != undefined) {
                _self.set(data);
                _self.lastUpdatedAt = data[0].lastUpdatedAt;
                _self.trigger('loadData');
            }
        })
    },
    fetchChangeData: function () {
        var _self = this;
        $.post("http://6btc.com/coinmarketcap/crycurrencies", {updatedAt: _self.lastUpdatedAt}, function (data, status) {
            if (data != null && data != undefined && $.isArray(data) && data.length > 0) {
                _self.lastUpdatedAt = data[0].lastUpdatedAt;
                for (var index in data) {
                    var model = _self.findWhere({
                        'id':data[index]['id']
                    })
                    if (model != null) {
                        delete data[index]['rank'];
                        model.set(data[index]);
                    }
                }
                _self.trigger('loadChangeData');
            }
        })
    }
});