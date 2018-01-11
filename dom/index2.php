<?php
function html(){
    error_reporting(E_ALL || ~E_NOTICE);
    header("Content-type: text/html; charset=utf-8"); 
    //var_dump($str);
    $html="";
    $html='<!DOCTYPE html>
    <head>
        <title>互联现金</title>
        <meta http-equiv="content-Type" content="text/html" charset="UTF-8">
        <meta name="Description" content="互联现金" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.css"/>

        <link href="http://www.6btc.com/static/css/bootstrap.css" rel="stylesheet">
        <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
        <link href="https://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/font-awesome/4.0.1/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/common/common-use.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/common/common-style.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/common/common-animation.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/lib/jquery-notify.css" rel="stylesheet"/>
        
        <link type="image/x-icon" href="http://www.6btc.com/static/images/ico/favicon.ico" rel="shortcut icon"/>

        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
        <!-- Latest compiled and minified Locales -->
        <script src="http://www.6btc.com/static/script/lib/bootstrap-table-zh-CN.min.js"></script>
        <script src="https://cdn.bootcss.com/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="https://cdn.bootcss.com/backbone.js/1.3.3/backbone-min.js"></script>
        <script src="http://www.6btc.com/static/script/lib/jquery-notify.js"></script>

        <script src="http://www.6btc.com/static/script/base/customFunc.js"></script>
        <script src="http://www.6btc.com/static/script/base/customFormatFunc.js"></script>
        <script src="http://www.6btc.com/static/script/models/CryptocurrencyGlobalDataModel.js"></script>
        <script src="http://www.6btc.com/static/script/models/CryptocurrencyModel.js"></script>
        <script src="http://www.6btc.com/static/script/models/CryptoCurrencySearchModel.js"></script>
        <script src="http://www.6btc.com/static/script/view/btcinfoIndexView.js"></script>

        <script>
            var fPageData = [{"availableSupply":16703437.00,"id":"bitcoin","lastUpdatedAt":1511747814056,"marketCapCny":1058425293908.00000000,"nameEN":"Bitcoin","nameZh":"比特币","percentChange24h":9.44,"percentChange7d":20.94,"priceBtc":1.00000000,"priceCny":63365.71891810,"rank":1,"symbol":"btc","totalSupply":16703437.00,"volumeCny24h":40217594061.80000000},{"availableSupply":95975856.00,"id":"ethereum","lastUpdatedAt":1511747814056,"marketCapCny":298561495761.00000000,"nameEN":"Ethereum","nameZh":"以太坊","percentChange24h":2.96,"percentChange7d":33.86,"priceBtc":0.04904220,"priceCny":3110.79796074,"rank":2,"symbol":"eth","totalSupply":95975856.00,"volumeCny24h":7563960807.26000000},{"availableSupply":16824275.00,"id":"bitcoin-cash","lastUpdatedAt":1511747814056,"marketCapCny":186757205336.00000000,"nameEN":"Bitcoin Cash","nameZh":"比特现金","percentChange24h":7.74,"percentChange7d":43.51,"priceBtc":0.17500000,"priceCny":11100.46081250,"rank":3,"symbol":"bch","totalSupply":16824275.00,"volumeCny24h":10703520740.90000000},{"availableSupply":38622870411.00,"id":"ripple","lastUpdatedAt":1511747814056,"marketCapCny":63276910069.00000000,"nameEN":"Ripple","nameZh":"瑞波币","percentChange24h":0.09,"percentChange7d":7.43,"priceBtc":0.00002583,"priceCny":1.63832748,"rank":4,"symbol":"xrp","totalSupply":99993173757.00,"volumeCny24h":875210031.98200000},{"availableSupply":16673661.00,"id":"bitcoin-gold","lastUpdatedAt":1511747814056,"marketCapCny":39688098762.00000000,"nameEN":"Bitcoin Gold [Pre-Launch]","percentChange24h":1.87,"percentChange7d":179.46,"priceBtc":0.03752560,"priceCny":2380.28700179,"rank":5,"symbol":"btg","totalSupply":16773661.00,"volumeCny24h":1013017738.93000000},{"availableSupply":7712624.00,"id":"dash","lastUpdatedAt":1511747814056,"marketCapCny":31739680937.00000000,"nameEN":"Dash","nameZh":"达世币","percentChange24h":-0.73,"percentChange7d":42.60,"priceBtc":0.06487820,"priceCny":4115.28975907,"rank":6,"symbol":"dash","totalSupply":7712624.00,"volumeCny24h":951629659.00600000},{"availableSupply":54007158.00,"id":"litecoin","lastUpdatedAt":1511747814056,"marketCapCny":30785792373.00000000,"nameEN":"Litecoin","nameZh":"莱特币","percentChange24h":-0.18,"percentChange7d":21.90,"priceBtc":0.00898665,"priceCny":570.03170368,"rank":7,"symbol":"ltc","totalSupply":54007158.00,"volumeCny24h":2126699113.86000000},{"availableSupply":65000000.00,"id":"neo","lastUpdatedAt":1511747814056,"marketCapCny":16625711651.00000000,"nameEN":"NEO","nameZh":"小蚁","percentChange24h":2.59,"percentChange7d":-2.95,"priceBtc":0.00403242,"priceCny":255.78017925,"rank":8,"symbol":"neo","totalSupply":100000000.00,"volumeCny24h":420901626.09000000},{"availableSupply":15403968.00,"id":"monero","lastUpdatedAt":1511747814056,"marketCapCny":16587679608.00000000,"nameEN":"Monero","nameZh":"门罗币","percentChange24h":-0.40,"percentChange7d":26.51,"priceBtc":0.01697670,"priceCny":1076.84460400,"rank":9,"symbol":"xmr","totalSupply":15403968.00,"volumeCny24h":404186467.25300000},{"availableSupply":2779530283.00,"id":"iota","lastUpdatedAt":1511747814056,"marketCapCny":15024311008.00000000,"nameEN":"IOTA","nameZh":"艾欧塔","percentChange24h":1.65,"percentChange7d":-6.10,"priceBtc":0.00008522,"priceCny":5.40534172,"rank":10,"symbol":"miota","totalSupply":2779530283.00,"volumeCny24h":325088099.53900000},{"availableSupply":97829146.00,"id":"ethereum-classic","lastUpdatedAt":1511747814056,"marketCapCny":14142162493.00000000,"nameEN":"Ethereum Classic","nameZh":"以太经典","percentChange24h":1.90,"percentChange7d":22.48,"priceBtc":0.00227900,"priceCny":144.55980729,"rank":11,"symbol":"etc","totalSupply":97829146.00,"volumeCny24h":1187204535.95000000},{"availableSupply":8999999999.00,"id":"nem","lastUpdatedAt":1511747814056,"marketCapCny":12790068165.00000000,"nameEN":"NEM","nameZh":"新经币","percentChange24h":1.18,"percentChange7d":7.23,"priceBtc":0.00002240,"priceCny":1.42111869,"rank":12,"symbol":"xem","totalSupply":8999999999.00,"volumeCny24h":80275261.35460000},{"availableSupply":500700398.00,"id":"eos","lastUpdatedAt":1511747814056,"marketCapCny":8049083301.00000000,"nameEN":"EOS","nameZh":"柚子","percentChange24h":21.81,"percentChange7d":26.99,"priceBtc":0.00025344,"priceCny":16.07564791,"rank":13,"symbol":"eos","totalSupply":1000000000.00,"volumeCny24h":769799591.62600000},{"availableSupply":73690416.00,"id":"qtum","lastUpdatedAt":1511747814056,"marketCapCny":7156996972.00000000,"nameEN":"Qtum","nameZh":"量子链","percentChange24h":3.27,"percentChange7d":4.38,"priceBtc":0.00153116,"priceCny":97.12249381,"rank":14,"symbol":"qtum","totalSupply":100190416.00,"volumeCny24h":772192608.69400000},{"availableSupply":25927070538.00,"id":"cardano","lastUpdatedAt":1511747814056,"marketCapCny":6380963132.00000000,"nameEN":"Cardano","percentChange24h":23.82,"percentChange7d":29.16,"priceBtc":0.00000388,"priceCny":0.24611200,"rank":15,"symbol":"ada","totalSupply":31112483745.00,"volumeCny24h":221614303.05000000},{"availableSupply":2707669.00,"id":"zcash","lastUpdatedAt":1511747814056,"marketCapCny":6107723085.00000000,"nameEN":"Zcash","nameZh":"大零币","percentChange24h":0.25,"percentChange7d":15.98,"priceBtc":0.03556160,"priceCny":2255.71281000,"rank":16,"symbol":"zec","totalSupply":2707669.00,"volumeCny24h":519622079.93300000},{"availableSupply":42299514.00,"id":"hshare","lastUpdatedAt":1511747814056,"marketCapCny":5816670497.00000000,"nameEN":"Hshare","nameZh":"红烧肉","percentChange24h":10.96,"percentChange7d":9.29,"priceBtc":0.00216789,"priceCny":137.51152205,"rank":17,"symbol":"hsr","totalSupply":42299514.00,"volumeCny24h":376184898.40900000},{"availableSupply":102042552.00,"id":"omisego","lastUpdatedAt":1511747814056,"marketCapCny":5811598298.00000000,"nameEN":"OmiseGo","nameZh":"嫩模币","percentChange24h":1.72,"percentChange7d":10.59,"priceBtc":0.00089787,"priceCny":56.95269471,"rank":18,"symbol":"omg","totalSupply":140245398.00,"volumeCny24h":230891494.08300000},{"availableSupply":115320168.00,"id":"lisk","lastUpdatedAt":1511747814056,"marketCapCny":5806867460.00000000,"nameEN":"Lisk","nameZh":"应用链","percentChange24h":-3.77,"percentChange7d":-20.22,"priceBtc":0.00079384,"priceCny":50.35430975,"rank":19,"symbol":"lsk","totalSupply":115320168.00,"volumeCny24h":205487591.03300000},{"availableSupply":17713853490.00,"id":"stellar","lastUpdatedAt":1511747814056,"marketCapCny":5649739948.00000000,"nameEN":"Stellar Lumens","nameZh":"恒星币","percentChange24h":10.59,"percentChange7d":32.14,"priceBtc":0.00000503,"priceCny":0.31894471,"rank":20,"symbol":"xlm","totalSupply":103452109577.00,"volumeCny24h":217084570.19600000},{"availableSupply":674967839.00,"id":"tether","lastUpdatedAt":1511747814056,"marketCapCny":4442973706.00000000,"nameEN":"Tether","nameZh":"泰达币","percentChange24h":0.17,"percentChange7d":0.72,"priceBtc":0.00010377,"priceCny":6.58249689,"rank":21,"symbol":"usdt","totalSupply":675000482.00,"volumeCny24h":4367537295.91000000},{"availableSupply":2138092.00,"id":"bitconnect","lastUpdatedAt":1511747814056,"marketCapCny":4242129927.00000000,"nameEN":"BitConnect","percentChange24h":-0.60,"percentChange7d":4.08,"priceBtc":0.03127930,"priceCny":1984.07268129,"rank":22,"symbol":"bcc","totalSupply":8392580.00,"volumeCny24h":149732254.83800000},{"availableSupply":100000000.00,"id":"waves","lastUpdatedAt":1511747814056,"marketCapCny":3671463553.00000000,"nameEN":"Waves","nameZh":"波币","percentChange24h":3.93,"percentChange7d":8.20,"priceBtc":0.00057881,"priceCny":36.71463553,"rank":23,"symbol":"waves","totalSupply":100000000.00,"volumeCny24h":175493148.95800000},{"availableSupply":41252246.00,"id":"populous","lastUpdatedAt":1511747814056,"marketCapCny":3147275667.00000000,"nameEN":"Populous","percentChange24h":1.27,"percentChange7d":23.87,"priceBtc":0.00120277,"priceCny":76.29343787,"rank":24,"symbol":"ppt","totalSupply":53252246.00,"volumeCny24h":7351269.97332000},{"availableSupply":98637747.00,"id":"stratis","lastUpdatedAt":1511747814056,"marketCapCny":2983807134.00000000,"nameEN":"Stratis","percentChange24h":-3.17,"percentChange7d":33.26,"priceBtc":0.00047690,"priceCny":30.25015491,"rank":25,"symbol":"strat","totalSupply":98637747.00,"volumeCny24h":107660922.52800000},{"availableSupply":6240671.00,"id":"decred","lastUpdatedAt":1511747814056,"marketCapCny":2758307617.00000000,"nameEN":"Decred","percentChange24h":41.01,"percentChange7d":96.26,"priceBtc":0.00696803,"priceCny":441.98894480,"rank":26,"symbol":"dcr","totalSupply":6660671.00,"volumeCny24h":119742389.57200000},{"availableSupply":2602790000.00,"id":"bitshares","lastUpdatedAt":1511747814056,"marketCapCny":2386833874.00000000,"nameEN":"BitShares","nameZh":"比特股","percentChange24h":3.66,"percentChange7d":36.54,"priceBtc":0.00001446,"priceCny":0.91702899,"rank":27,"symbol":"bts","totalSupply":2602790000.00,"volumeCny24h":91256986.67540000},{"availableSupply":97981284.00,"id":"ark","lastUpdatedAt":1511747814056,"marketCapCny":2193878726.00000000,"nameEN":"Ark","percentChange24h":7.40,"percentChange7d":9.02,"priceBtc":0.00035299,"priceCny":22.39079380,"rank":28,"symbol":"ark","totalSupply":129231284.00,"volumeCny24h":59954623.46850000},{"availableSupply":998999495.00,"id":"ardor","lastUpdatedAt":1511747814056,"marketCapCny":2174885460.00000000,"nameEN":"Ardor","nameZh":"阿朵币","percentChange24h":20.03,"percentChange7d":37.83,"priceBtc":0.00003432,"priceCny":2.17706362,"rank":29,"symbol":"ardr","totalSupply":998999495.00,"volumeCny24h":21892444.72530000},{"availableSupply":183253534612.00,"id":"bytecoin-bcn","lastUpdatedAt":1511747814056,"marketCapCny":2105872983.00000000,"nameEN":"Bytecoin","nameZh":"百特币","percentChange24h":7.79,"percentChange7d":36.17,"priceBtc":1.8E-7,"priceCny":0.01149158,"rank":30,"symbol":"bcn","totalSupply":183253534612.00,"volumeCny24h":23010362.91740000},{"availableSupply":103624884.00,"id":"komodo","lastUpdatedAt":1511747814056,"marketCapCny":2026174902.00000000,"nameEN":"Komodo","nameZh":"科莫多币","percentChange24h":12.99,"percentChange7d":25.66,"priceBtc":0.00030826,"priceCny":19.55297632,"rank":31,"symbol":"kmd","totalSupply":103624884.00,"volumeCny24h":58708031.57180000},{"availableSupply":11000000.00,"id":"augur","lastUpdatedAt":1511747814056,"marketCapCny":1985257421.00000000,"nameEN":"Augur","percentChange24h":-1.64,"percentChange7d":37.32,"priceBtc":0.00284527,"priceCny":180.47794735,"rank":32,"symbol":"rep","totalSupply":11000000.00,"volumeCny24h":15120141.03990000},{"availableSupply":246757677.00,"id":"steem","lastUpdatedAt":1511747814056,"marketCapCny":1788587778.00000000,"nameEN":"Steem","nameZh":"斯蒂姆币","percentChange24h":8.26,"percentChange7d":22.01,"priceBtc":0.00011427,"priceCny":7.24835716,"rank":33,"symbol":"steem","totalSupply":263731771.00,"volumeCny24h":14596619.51900000},{"availableSupply":350354900.00,"id":"power-ledger","lastUpdatedAt":1511747814056,"marketCapCny":1757324906.00000000,"nameEN":"Power Ledger","percentChange24h":-1.51,"percentChange7d":70.21,"priceBtc":0.00007908,"priceCny":5.01584223,"rank":34,"symbol":"powr","totalSupply":1000000000.00,"volumeCny24h":262657161.08600000},{"availableSupply":50000000.00,"id":"raiden-network-token","lastUpdatedAt":1511747814056,"marketCapCny":1750554099.00000000,"nameEN":"Raiden Network Token","nameZh":"雷电网络","percentChange24h":22.13,"percentChange7d":141.18,"priceBtc":0.00055196,"priceCny":35.01108198,"rank":35,"symbol":"rdn","totalSupply":100000000.00,"volumeCny24h":115410113.31700000},{"availableSupply":55605625.00,"id":"monacoin","lastUpdatedAt":1511747814056,"marketCapCny":1670506456.00000000,"nameEN":"MonaCoin","nameZh":"萌奈币","percentChange24h":4.51,"percentChange7d":50.75,"priceBtc":0.00047362,"priceCny":30.04204088,"rank":36,"symbol":"mona","totalSupply":55605625.00,"volumeCny24h":56344894.52570000},{"availableSupply":104661310.00,"id":"tenx","lastUpdatedAt":1511747814056,"marketCapCny":1562751516.00000000,"nameEN":"TenX","percentChange24h":11.96,"percentChange7d":30.48,"priceBtc":0.00023540,"priceCny":14.93151114,"rank":37,"symbol":"pay","totalSupply":205218256.00,"volumeCny24h":62644152.35080000},{"availableSupply":833032000.00,"id":"golem-network-tokens","lastUpdatedAt":1511747814056,"marketCapCny":1543896484.00000000,"nameEN":"Golem","percentChange24h":11.88,"percentChange7d":31.66,"priceBtc":0.00002922,"priceCny":1.85334595,"rank":38,"symbol":"gnt","totalSupply":1000000000.00,"volumeCny24h":26368825.06800000},{"availableSupply":41566050.00,"id":"vertcoin","lastUpdatedAt":1511747814056,"marketCapCny":1488053429.00000000,"nameEN":"Vertcoin","nameZh":"绿币","percentChange24h":14.37,"percentChange7d":31.02,"priceBtc":0.00056439,"priceCny":35.79973149,"rank":39,"symbol":"vtc","totalSupply":41566050.00,"volumeCny24h":333799073.96400000},{"availableSupply":112088946846.00,"id":"dogecoin","lastUpdatedAt":1511747814056,"marketCapCny":1446144905.00000000,"nameEN":"Dogecoin","nameZh":"狗狗币","percentChange24h":-4.76,"percentChange7d":43.45,"priceBtc":2.0E-7,"priceCny":0.01290176,"rank":40,"symbol":"doge","totalSupply":112088946846.00,"volumeCny24h":53317858.70060000},{"availableSupply":48941347.00,"id":"salt","lastUpdatedAt":1511747814056,"marketCapCny":1426260505.00000000,"nameEN":"SALT","percentChange24h":13.84,"percentChange7d":20.86,"priceBtc":0.00045943,"priceCny":29.14224031,"rank":41,"symbol":"salt","totalSupply":120000000.00,"volumeCny24h":47946712.27660000},{"availableSupply":452552412.00,"id":"maidsafecoin","lastUpdatedAt":1511747814056,"marketCapCny":1387397350.00000000,"nameEN":"MaidSafeCoin","nameZh":"互联网币","percentChange24h":-1.26,"percentChange7d":20.46,"priceBtc":0.00004833,"priceCny":3.06571640,"rank":42,"symbol":"maid","totalSupply":452552412.00,"volumeCny24h":17488443.34150000},{"availableSupply":645222.00,"id":"byteball","lastUpdatedAt":1511747814056,"marketCapCny":1338190817.00000000,"nameEN":"Byteball","nameZh":"字节雪球","percentChange24h":24.91,"percentChange7d":30.16,"priceBtc":0.03269700,"priceCny":2074.00043198,"rank":43,"symbol":"gbyte","totalSupply":1000000.00,"volumeCny24h":5035064.83022000},{"availableSupply":24798538.00,"id":"exchange-union","lastUpdatedAt":1511747814056,"marketCapCny":1305580702.00000000,"nameEN":"Exchange Union","percentChange24h":2.49,"percentChange7d":168.04,"priceBtc":0.00083000,"priceCny":52.64748701,"rank":44,"symbol":"xuc","totalSupply":3000000000.00,"volumeCny24h":18310961.22990000},{"availableSupply":55004892.00,"id":"pivx","lastUpdatedAt":1511747814056,"marketCapCny":1300308510.00000000,"nameEN":"PIVX","nameZh":"普维币","percentChange24h":10.48,"percentChange7d":20.25,"priceBtc":0.00037269,"priceCny":23.63987025,"rank":45,"symbol":"pivx","totalSupply":55004892.00,"volumeCny24h":12380921.09280000},{"availableSupply":8745102.00,"id":"factom","lastUpdatedAt":1511747814056,"marketCapCny":1295826893.00000000,"nameEN":"Factom","nameZh":"公证通","percentChange24h":-2.20,"percentChange7d":19.37,"priceBtc":0.00233604,"priceCny":148.17744757,"rank":46,"symbol":"fct","totalSupply":8745102.00,"volumeCny24h":31262348.82320000},{"availableSupply":8597035.00,"id":"gas","lastUpdatedAt":1511747814056,"marketCapCny":1295774929.00000000,"nameEN":"Gas","percentChange24h":5.14,"percentChange7d":-3.98,"priceBtc":0.00237618,"priceCny":150.72346082,"rank":47,"symbol":"gas","totalSupply":11822072.00,"volumeCny24h":11410768.43560000},{"availableSupply":2026045.00,"id":"veritaseum","lastUpdatedAt":1511747814056,"marketCapCny":1260836231.00000000,"nameEN":"Veritaseum","percentChange24h":7.61,"percentChange7d":-13.11,"priceBtc":0.00981088,"priceCny":622.31389598,"rank":48,"symbol":"veri","totalSupply":100000000.00,"volumeCny24h":3482513.27863000},{"availableSupply":99014000.00,"id":"binance-coin","lastUpdatedAt":1511747814056,"marketCapCny":1238657388.00000000,"nameEN":"Binance Coin","nameZh":"币安币","percentChange24h":1.54,"percentChange7d":19.60,"priceBtc":0.00019722,"priceCny":12.50992171,"rank":49,"symbol":"bnb","totalSupply":199013968.00,"volumeCny24h":70033017.53760000},{"availableSupply":2000000.00,"id":"digixdao","lastUpdatedAt":1511747814056,"marketCapCny":1217304245.00000000,"nameEN":"DigixDAO","percentChange24h":5.60,"percentChange7d":31.90,"priceBtc":0.00959550,"priceCny":608.65212231,"rank":50,"symbol":"dgd","totalSupply":2000000.00,"volumeCny24h":2135375.43531000},{"availableSupply":1000000000.00,"id":"basic-attention-token","lastUpdatedAt":1511747814056,"marketCapCny":1200967653.00000000,"nameEN":"Basic Attention Token","percentChange24h":9.84,"percentChange7d":14.96,"priceBtc":0.00001893,"priceCny":1.20096765,"rank":51,"symbol":"bat","totalSupply":1500000000.00,"volumeCny24h":27941874.18390000},{"availableSupply":1288862.00,"id":"bitcoindark","lastUpdatedAt":1511747814056,"marketCapCny":1194328474.00000000,"nameEN":"BitcoinDark","nameZh":"匿名比特","percentChange24h":18.34,"percentChange7d":30.27,"priceBtc":0.01460890,"priceCny":926.65336065,"rank":52,"symbol":"btcd","totalSupply":1288862.00,"volumeCny24h":1332289.36857000},{"availableSupply":31160411994.00,"id":"siacoin","lastUpdatedAt":1511747814056,"marketCapCny":1189413152.00000000,"nameEN":"Siacoin","nameZh":"云储币","percentChange24h":9.09,"percentChange7d":37.53,"priceBtc":6.0E-7,"priceCny":0.03817065,"rank":53,"symbol":"sc","totalSupply":31160411994.00,"volumeCny24h":14379940.32330000},{"availableSupply":998999942.00,"id":"nxt","lastUpdatedAt":1511747814056,"marketCapCny":1183260860.00000000,"nameEN":"Nxt","nameZh":"未来币","percentChange24h":40.96,"percentChange7d":134.48,"priceBtc":0.00001867,"priceCny":1.18444537,"rank":54,"symbol":"nxt","totalSupply":998999942.00,"volumeCny24h":190924186.06800000},{"availableSupply":134132697.00,"id":"kyber-network","lastUpdatedAt":1511747814056,"marketCapCny":1149571002.00000000,"nameEN":"Kyber Network","percentChange24h":14.08,"percentChange7d":18.12,"priceBtc":0.00013511,"priceCny":8.57040102,"rank":55,"symbol":"knc","totalSupply":215625349.00,"volumeCny24h":58300041.77660000},{"availableSupply":529143568.00,"id":"syscoin","lastUpdatedAt":1511747814056,"marketCapCny":1124730630.00000000,"nameEN":"SysCoin","nameZh":"系统币","percentChange24h":0.03,"percentChange7d":57.25,"priceBtc":0.00003351,"priceCny":2.12556799,"rank":56,"symbol":"sys","totalSupply":529143568.00,"volumeCny24h":224538883.74600000},{"availableSupply":99788314.00,"id":"iconomi","lastUpdatedAt":1511747814056,"marketCapCny":1084912866.00000000,"nameEN":"Iconomi","percentChange24h":-6.73,"percentChange7d":49.07,"priceBtc":0.00017140,"priceCny":10.87214345,"rank":57,"symbol":"icn","totalSupply":99788314.00,"volumeCny24h":9415999.09874000},{"availableSupply":74526119.00,"id":"bitquence","lastUpdatedAt":1511747814056,"marketCapCny":952624589.00000000,"nameEN":"Bitquence","percentChange24h":35.05,"percentChange7d":74.00,"priceBtc":0.00023376,"priceCny":12.78242577,"rank":58,"symbol":"bqx","totalSupply":222295208.00,"volumeCny24h":72231128.40000000},{"availableSupply":65698192465.00,"id":"tron","lastUpdatedAt":1511747814056,"marketCapCny":927025561.00000000,"nameEN":"TRON","nameZh":"波场","percentChange24h":4.98,"percentChange7d":6.85,"priceBtc":2.2E-7,"priceCny":0.01411037,"rank":59,"symbol":"trx","totalSupply":100000000000.00,"volumeCny24h":41900225.05210000},{"availableSupply":64355352.00,"id":"gamecredits","lastUpdatedAt":1511747814056,"marketCapCny":917797480.00000000,"nameEN":"GameCredits","nameZh":"游戏币","percentChange24h":-0.11,"percentChange7d":14.64,"priceBtc":0.00022483,"priceCny":14.26140098,"rank":60,"symbol":"game","totalSupply":64355352.00,"volumeCny24h":12863709.01710000},{"availableSupply":36476033.00,"id":"metaverse","lastUpdatedAt":1511747814056,"marketCapCny":906566956.00000000,"nameEN":"Metaverse ETP","nameZh":"元界","percentChange24h":0.49,"percentChange7d":19.18,"priceBtc":0.00039182,"priceCny":24.85377066,"rank":61,"symbol":"etp","totalSupply":55876033.00,"volumeCny24h":34948510.46960000},{"availableSupply":233020472.00,"id":"aeternity","lastUpdatedAt":1511747814056,"marketCapCny":859001405.00000000,"nameEN":"Aeternity (Pre-Launch)","percentChange24h":-8.74,"percentChange7d":3.39,"priceBtc":0.00005812,"priceCny":3.68637741,"rank":62,"symbol":"ae","totalSupply":273685830.00,"volumeCny24h":10130438.92120000},{"availableSupply":3470483788.00,"id":"status","lastUpdatedAt":1511747814056,"marketCapCny":849333079.00000000,"nameEN":"Status","percentChange24h":8.95,"percentChange7d":27.19,"priceBtc":0.00000386,"priceCny":0.24473046,"rank":63,"symbol":"snt","totalSupply":6804870174.00,"volumeCny24h":29252345.25200000},{"availableSupply":74526219.00,"id":"ethos","lastUpdatedAt":1511747814056,"marketCapCny":845611522.00000000,"nameEN":"Ethos","percentChange24h":-0.36,"percentChange7d":20.54,"priceBtc":0.00017888,"priceCny":11.34649697,"rank":64,"symbol":"bqx","totalSupply":222295208.00,"volumeCny24h":8021118.60342000},{"availableSupply":24898178.00,"id":"walton","lastUpdatedAt":1511747814056,"marketCapCny":840451260.00000000,"nameEN":"Walton","nameZh":"沃尔顿链","percentChange24h":-0.69,"percentChange7d":4.75,"priceBtc":0.00053216,"priceCny":33.75553262,"rank":65,"symbol":"wtc","totalSupply":70000000.00,"volumeCny24h":73087710.36320000},{"availableSupply":3525630.00,"id":"zcoin","lastUpdatedAt":1511747814056,"marketCapCny":811135831.00000000,"nameEN":"ZCoin","nameZh":"小零币","percentChange24h":-4.29,"percentChange7d":51.25,"priceBtc":0.00362707,"priceCny":230.06832236,"rank":66,"symbol":"xzc","totalSupply":3525630.00,"volumeCny24h":37103795.02230000},{"availableSupply":40510000.00,"id":"gxshares","lastUpdatedAt":1511747814056,"marketCapCny":803618059.00000000,"nameEN":"GXShares","nameZh":"公信宝","percentChange24h":3.58,"percentChange7d":36.09,"priceBtc":0.00031274,"priceCny":19.83752305,"rank":67,"symbol":"gxs","totalSupply":100000000.00,"volumeCny24h":77069533.84520000},{"availableSupply":342700000.00,"id":"civic","lastUpdatedAt":1511747814056,"marketCapCny":791581085.00000000,"nameEN":"Civic","percentChange24h":4.23,"percentChange7d":16.66,"priceBtc":0.00003641,"priceCny":2.30983684,"rank":68,"symbol":"cvc","totalSupply":1000000000.00,"volumeCny24h":22870639.48910000},{"availableSupply":171877026.00,"id":"pura","lastUpdatedAt":1511747814056,"marketCapCny":789604925.00000000,"nameEN":"Pura","percentChange24h":3.92,"percentChange7d":1.98,"priceBtc":0.00007243,"priceCny":4.59401086,"rank":69,"symbol":"pura","totalSupply":178659520.00,"volumeCny24h":2444283.86262000},{"availableSupply":1104590.00,"id":"gnosis-gno","lastUpdatedAt":1511747814056,"marketCapCny":782215386.00000000,"nameEN":"Gnosis","percentChange24h":-4.33,"percentChange7d":58.23,"priceBtc":0.01116410,"priceCny":708.14997978,"rank":70,"symbol":"gno","totalSupply":10000000.00,"volumeCny24h":14668083.11620000},{"availableSupply":4902003.00,"id":"blocknet","lastUpdatedAt":1511747814056,"marketCapCny":776298228.00000000,"nameEN":"Blocknet","percentChange24h":2.23,"percentChange7d":8.20,"priceBtc":0.00249663,"priceCny":158.36346203,"rank":71,"symbol":"block","totalSupply":4902003.00,"volumeCny24h":1510817.59546000},{"availableSupply":500000000.00,"id":"0x","lastUpdatedAt":1511747814056,"marketCapCny":751286401.00000000,"nameEN":"0x","nameZh":"0x协议","percentChange24h":2.36,"percentChange7d":16.07,"priceBtc":0.00002369,"priceCny":1.50257280,"rank":72,"symbol":"zrx","totalSupply":1000000000.00,"volumeCny24h":20690378.63800000},{"availableSupply":216042544.00,"id":"einsteinium","lastUpdatedAt":1511747814056,"marketCapCny":737212947.00000000,"nameEN":"Einsteinium","nameZh":"锿币","percentChange24h":110.33,"percentChange7d":316.57,"priceBtc":0.00005380,"priceCny":3.41235080,"rank":73,"symbol":"emc2","totalSupply":216042544.00,"volumeCny24h":1056778567.44000000},{"availableSupply":40772871.00,"id":"bancor","lastUpdatedAt":1511747814056,"marketCapCny":713280636.00000000,"nameEN":"Bancor","percentChange24h":2.67,"percentChange7d":27.60,"priceBtc":0.00027580,"priceCny":17.49400089,"rank":74,"symbol":"bnt","totalSupply":79384422.00,"volumeCny24h":31691718.85280000},{"availableSupply":987000000.00,"id":"bytom","lastUpdatedAt":1511747814056,"marketCapCny":683752962.00000000,"nameEN":"Bytom","nameZh":"比原链","percentChange24h":-1.47,"percentChange7d":-7.86,"priceBtc":0.00001092,"priceCny":0.69275883,"rank":75,"symbol":"btm","totalSupply":1407000000.00,"volumeCny24h":5182013.07777000},{"availableSupply":9464660754.00,"id":"digibyte","lastUpdatedAt":1511747814056,"marketCapCny":676397268.00000000,"nameEN":"DigiByte","nameZh":"极特币","percentChange24h":6.00,"percentChange7d":20.52,"priceBtc":0.00000113,"priceCny":0.07146556,"rank":76,"symbol":"dgb","totalSupply":9464660754.00,"volumeCny24h":24502860.20180000},{"availableSupply":617314171.00,"id":"quantstamp","lastUpdatedAt":1511747814056,"marketCapCny":669711904.00000000,"nameEN":"Quantstamp","percentChange24h":-6.12,"priceBtc":0.00001710,"priceCny":1.08488017,"rank":77,"symbol":"qsp","totalSupply":976442388.00,"volumeCny24h":141027818.71100000},{"availableSupply":14315100689.00,"id":"verge","lastUpdatedAt":1511747814056,"marketCapCny":662623160.00000000,"nameEN":"Verge","percentChange24h":22.39,"percentChange7d":15.81,"priceBtc":7.3E-7,"priceCny":0.04628840,"rank":78,"symbol":"xvg","totalSupply":14315100689.00,"volumeCny24h":28966490.86340000},{"availableSupply":19300994.00,"id":"metal","lastUpdatedAt":1511747814056,"marketCapCny":654805253.00000000,"nameEN":"Metal","percentChange24h":4.85,"percentChange7d":23.22,"priceBtc":0.00053485,"priceCny":33.92598605,"rank":79,"symbol":"mtl","totalSupply":66588888.00,"volumeCny24h":41879367.88150000},{"availableSupply":4249873622.00,"id":"funfair","lastUpdatedAt":1511747814056,"marketCapCny":654062892.00000000,"nameEN":"FunFair","percentChange24h":4.63,"percentChange7d":37.86,"priceBtc":0.00000243,"priceCny":0.15390173,"rank":80,"symbol":"fun","totalSupply":10999873621.00,"volumeCny24h":8732943.10668000},{"availableSupply":600000000.00,"id":"singulardtv","lastUpdatedAt":1511747814056,"marketCapCny":632156650.00000000,"nameEN":"SingularDTV","percentChange24h":16.24,"percentChange7d":22.37,"priceBtc":0.00001661,"priceCny":1.05359442,"rank":81,"symbol":"sngls","totalSupply":1000000000.00,"volumeCny24h":29768086.19820000},{"availableSupply":44983065.00,"id":"cryptonex","lastUpdatedAt":1511747814056,"marketCapCny":623654189.00000000,"nameEN":"Cryptonex","percentChange24h":13.43,"percentChange7d":63.70,"priceBtc":0.00021857,"priceCny":13.86419938,"rank":82,"symbol":"cnx","totalSupply":106420691.00,"volumeCny24h":748720.11887400},{"availableSupply":263032535.00,"id":"lykke","lastUpdatedAt":1511747814056,"marketCapCny":591862320.00000000,"nameEN":"Lykke","percentChange24h":-1.75,"percentChange7d":-4.11,"priceBtc":0.00003547,"priceCny":2.25014872,"rank":83,"symbol":"lkk","totalSupply":1285690000.00,"volumeCny24h":2183105.01071000},{"availableSupply":1007866955.00,"id":"bitbay","lastUpdatedAt":1511747814056,"marketCapCny":582611606.00000000,"nameEN":"BitBay","percentChange24h":49.70,"percentChange7d":78.13,"priceBtc":0.00000911,"priceCny":0.57806400,"rank":84,"symbol":"bay","totalSupply":1007866955.00,"volumeCny24h":117548136.76300000},{"availableSupply":60502560.00,"id":"santiment","lastUpdatedAt":1511747814056,"marketCapCny":517332583.00000000,"nameEN":"Santiment Network Token","percentChange24h":10.23,"percentChange7d":225.88,"priceBtc":0.00013480,"priceCny":8.55058998,"rank":85,"symbol":"san","totalSupply":83337000.00,"volumeCny24h":155169503.45500000},{"availableSupply":62085204.00,"id":"nav-coin","lastUpdatedAt":1511747814056,"marketCapCny":512098907.00000000,"nameEN":"NAV Coin","nameZh":"纳瓦霍币","percentChange24h":38.70,"percentChange7d":50.73,"priceBtc":0.00013004,"priceCny":8.24832446,"rank":86,"symbol":"nav","totalSupply":62085204.00,"volumeCny24h":104245315.65200000},{"availableSupply":105161351.00,"id":"storj","lastUpdatedAt":1511747814056,"marketCapCny":508629030.00000000,"nameEN":"Storj","percentChange24h":0.15,"percentChange7d":17.27,"priceBtc":0.00007625,"priceCny":4.83665364,"rank":87,"symbol":"storj","totalSupply":424999998.00,"volumeCny24h":43616528.27710000},{"availableSupply":2455648.00,"id":"zencash","lastUpdatedAt":1511747814056,"marketCapCny":501432558.00000000,"nameEN":"ZenCash","percentChange24h":-5.68,"percentChange7d":45.01,"priceBtc":0.00321918,"priceCny":204.19562335,"rank":88,"symbol":"zen","totalSupply":2455648.00,"volumeCny24h":15105822.16730000},{"availableSupply":485142647.00,"id":"ripio-credit-network","lastUpdatedAt":1511747814056,"marketCapCny":500917033.00000000,"nameEN":"Ripio Credit Network","percentChange24h":8.76,"percentChange7d":67.06,"priceBtc":0.00001628,"priceCny":1.03251494,"rank":89,"symbol":"rcn","totalSupply":999942647.00,"volumeCny24h":136335282.23600000},{"availableSupply":7785442.00,"id":"particl","lastUpdatedAt":1511747814056,"marketCapCny":499431423.00000000,"nameEN":"Particl","percentChange24h":10.20,"percentChange7d":14.72,"priceBtc":0.00101133,"priceCny":64.14939932,"rank":90,"symbol":"part","totalSupply":8781442.00,"volumeCny24h":2106528.46453000},{"availableSupply":82046288.00,"id":"edgeless","lastUpdatedAt":1511747814056,"marketCapCny":496818176.00000000,"nameEN":"Edgeless","nameZh":"网络黄金","percentChange24h":27.62,"percentChange7d":41.39,"priceBtc":0.00009546,"priceCny":6.05534008,"rank":91,"symbol":"edg","totalSupply":132046997.00,"volumeCny24h":21809669.87260000},{"availableSupply":98028887.00,"id":"mobilego","lastUpdatedAt":1511747814056,"marketCapCny":494911115.00000000,"nameEN":"MobileGo","percentChange24h":6.42,"percentChange7d":69.30,"priceBtc":0.00007959,"priceCny":5.04862526,"rank":92,"symbol":"mgo","totalSupply":100000000.00,"volumeCny24h":3627983.87084000},{"availableSupply":54013690.00,"id":"nexus","lastUpdatedAt":1511747814056,"marketCapCny":481558641.00000000,"nameEN":"Nexus","percentChange24h":-10.22,"percentChange7d":32.95,"priceBtc":0.00014055,"priceCny":8.91549239,"rank":93,"symbol":"nxs","totalSupply":54013690.00,"volumeCny24h":14719081.84060000},{"availableSupply":226091449.00,"id":"substratum","lastUpdatedAt":1511747814056,"marketCapCny":475474251.00000000,"nameEN":"Substratum","percentChange24h":-5.42,"percentChange7d":124.56,"priceBtc":0.00003315,"priceCny":2.10301740,"rank":94,"symbol":"sub","totalSupply":352000000.00,"volumeCny24h":48267808.09140000},{"availableSupply":57509601.00,"id":"adx-net","lastUpdatedAt":1511747814056,"marketCapCny":465137960.00000000,"nameEN":"AdEx","percentChange24h":11.31,"percentChange7d":22.37,"priceBtc":0.00012751,"priceCny":8.08800539,"rank":95,"symbol":"adx","totalSupply":100000000.00,"volumeCny24h":26250351.10830000},{"availableSupply":300000000.00,"id":"achain","lastUpdatedAt":1511747814056,"marketCapCny":455522568.00000000,"nameEN":"Achain","nameZh":"A链","percentChange24h":31.79,"percentChange7d":84.42,"priceBtc":0.00002394,"priceCny":1.51840856,"rank":96,"symbol":"act","totalSupply":1000000000.00,"volumeCny24h":6711432.13104000},{"availableSupply":32513859.00,"id":"aragon","lastUpdatedAt":1511747814056,"marketCapCny":453208479.00000000,"nameEN":"Aragon","percentChange24h":4.70,"percentChange7d":34.16,"priceBtc":0.00021975,"priceCny":13.93893212,"rank":97,"symbol":"ant","totalSupply":39609524.00,"volumeCny24h":4186021.06684000},{"availableSupply":3315252992.00,"id":"attention-token-of-media","lastUpdatedAt":1511747814056,"marketCapCny":450336400.00000000,"nameEN":"Attention Token of Media","percentChange24h":6.30,"percentChange7d":-20.34,"priceBtc":0.00000214,"priceCny":0.13583772,"rank":98,"symbol":"atm","totalSupply":10000000000.00,"volumeCny24h":287137.85645700},{"availableSupply":277162633.00,"id":"vechain","lastUpdatedAt":1511747814056,"marketCapCny":442331225.00000000,"nameEN":"VeChain","nameZh":"唯链","percentChange24h":-3.79,"percentChange7d":-3.88,"priceBtc":0.00002516,"priceCny":1.59592662,"rank":99,"symbol":"ven","totalSupply":867162633.00,"volumeCny24h":10913530.87270000},{"availableSupply":218756140.00,"id":"potcoin","lastUpdatedAt":1511747814056,"marketCapCny":437161852.00000000,"nameEN":"PotCoin","percentChange24h":10.28,"percentChange7d":143.17,"priceBtc":0.00003151,"priceCny":1.99839809,"rank":100,"symbol":"pot","totalSupply":218756140.00,"volumeCny24h":22017391.60010000}];
        </script>

        <style>
            #cryptocurrency-trade-coinmarket tr{border-top:1px solid #eee;height:60px;}
            thead{height:120px;}
            tbody tr td{text-align:left;}
        </style>
       
       
    </head>';


 $html.='
    <body>
        <div style="position:relative;background-color:#fff;margin:20px auto;box-shadow: 2px 2px 2px #f8f8f8;width:1400px;">
            <div style="width:1100px;margin:0 auto;padding-top:60px;padding-bottom:20px;">
                <h2 style="display:inline-block;">互联现金区块链行情监控平台</h2>
            </div>
            <div id="toolbar" style="width:1100px;margin:0 auto;">
                <div class="my-container" style="display:inline-block;margin-left:860px;">
                    <div class="myText-content" style="display:inline-block;">
                        <input style="display:inline-block;" id="busNo" type="text" class="form-control" placeholder="输入币种名称如BTC">
                    </div>
                </div>
                <div class="myBtn-content" style="display:inline-block;">
                    <button id="search" type="button" class="btn btn-primary">搜索</button>
                </div>
            </div>

            <div style="width:1100px;margin:0 auto;padding-top:40px;padding-bottom:160px;">
                <table id="cryptocurrency-trade-coinmarket" class="table-no-bordered table-border">
                    <thead>
                        <tr>
                            <th class="table-border-th id" style="text-align:left;width:75px" data-field="id" tabindex="0">
                                <div class="th-inner sortable both">市值</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th rank" style="text-align:left;width:240px" data-field="rank" tabindex="0">
                                <div class="th-inner sortable both">名称</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th symbol" style="text-align:left;width:60px" data-field="symbol" tabindex="0">
                                <div class="th-inner sortable both">缩写</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th priceBtc" style="text-align:left;width:150px" data-field="priceBtc" tabindex="0">
                                <div class="th-inner sortable both">价格(BTC)</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th priceCny" style="text-align:left;width:150px" data-field="priceCny" tabindex="0">
                                <div class="th-inner sortable both">价格(CNY)</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th volumeCny24h" style="text-align:left;width:150px" data-field="volumeCny24h" tabindex="0">
                                <div class="th-inner sortable both">日成交量</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th marketCapCny" style="text-align:left;width:150px" data-field="marketCapCny" tabindex="0">
                                <div class="th-inner sortable both">流通市值</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th percentChange24h" style="text-align:left;width:85px" data-field="percentChange24h" tabindex="0">
                                <div class="th-inner sortable both">日涨幅</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th percentChange7d" style="text-align:left;width:80px" data-field="percentChange7d" tabindex="0">
                                <div class="th-inner sortable both">7日涨幅</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th percentChange7d" style="text-align: center; width: 80px; " data-field="id" tabindex="0">
                                <div class="th-inner sortable both">价格监控</div>
                                <div class="fht-cell"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>';
                    //从本地读取文件
                    
                    if(true){
                        $json=file_get_contents("D:/soft/wamp/www/ICC/che/dom.txt");
                        $old=json_decode($json,true);
                        //var_dump($old);
                        

                        // $arr = ['Btc'];
                        // $res = array_column($old,null,'nameEN');
                        // $new = [];
                        // foreach($res as $k=>$v){
                        //     if(in_array($k,$arr)) $new[] = $v;
                        // }

                      
                        if(is_array($_GET)&&count($_GET)>0){
                           $get=$_GET['page'];//获得GET参数
                        }else{ 
                           $get=1; 
                        }
                        

                        $count=count($old);//查出总记录数
                        
                            $num=($get-1)*100;
                            $num2=$get*100;
                        
                        
                        $arraydata=array();
                        //查找符合的记录数
                        foreach($old as $k=>$v){
                            if($v['rank']>$num&&$v['rank']<=$num2){
                                $arraydata[]=$v;
                            }
                        }

                        
                        foreach($arraydata as $k=>$v){
                            $html.='<tr class="table-row-td-floatShadowHover" data-index="0" data-uniqueid="';$html.=$v["id"];$html.='">
                                <td class="table-border-th rank" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align:left; width: 75px; ">';
                                $html.=$v["rank"];$html.='</td>

                                <td class="table-border-th id" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 200px; ">
                                    <div style="width: 100%">
                                        <div style="display: inline-block;width: 120px;padding-left: 8px;text-align:left;">
                                            <img src="https://bitinfo-pic-16-16.oss-cn-hangzhou.aliyuncs.com/';$html.=$v["id"];$html.='.png" class="currency-logo" alt="bitcoin">&nbsp;&nbsp;';$html.=$v["nameEN"];
                                          
                                         $html.='</div>                                       
                                    </div>
                               </td>';

                                $up= strtoupper($v["symbol"]);
                                $html.='<td class="table-border-th symbol" style="text-align:left;border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; width: 90px; ">';
                                $html.=$up;
                                $html.='</td>';

                                $html.='<td class="table-border-th priceBtc" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 130px; ">
                                <div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: left;"><i class="fa fa-bitcoin"></i>&nbsp;</span><span style="display: inline-block;text-align: left;">';
                               

                                $html.=$v["priceBtc"];
                             

                                $html.='</span></div></td>';
                                
                                $html.='<td class="table-border-th priceCny dropDown" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 140px; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left;" \'="">';
                                if($v["priceCny"]>=1){
                                    $cny=round($v["priceCny"],2);
                                    $html.=$cny;
                                }else{
                                   $html.=$v["priceCny"]; 
                                }
                                
                                $html.='</span></div></td>';

                                if(!empty($v["volumeCny24h"])){
                                    if($v["volumeCny24h"]>=100000000){
                                        $html.='<td class="table-border-th volumeCny24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 130px; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left";>';
                                        $cny=$v["volumeCny24h"]/100000000;
                                        $cny=round($cny,2);
                                        $html.=$cny;
                                        $html.='&nbsp;亿</span></div></td>';
                                    }else{
                                        $html.='<td class="table-border-th volumeCny24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 130px; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left";>';
                                        $cny=$v["volumeCny24h"]/10000;
                                        $cny=round($cny,2);
                                        $html.=$cny;
                                        $html.='&nbsp;万</span></div></td>';
                                    }
                                }else{
                                    $html.='<td style="padding-left:16px;">—</td>';
                                }  
                                if(!empty($v["marketCapCny"])){
                                    if($v["marketCapCny"]>=1000000000){
                                        $html.='<td class="table-border-th marketCapCny" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left;">';
                                        $maket=$v["marketCapCny"]/100000000;
                                        $maket=round($maket,2);
                                        $html.=$maket;
                                        $html.='&nbsp;亿</span></div></td>';
                                    }else{
                                        $html.='<td class="table-border-th marketCapCny" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left;">';
                                        $maket=$v["marketCapCny"]/10000;
                                        $maket=round($maket,2);
                                        $html.=$maket;
                                        $html.='&nbsp;万</span></div></td>';
                                    }
                                } 
                                else{
                                    $html.='<td style="padding-left:16px;">—</td>';
                                }  
                                if(!empty($v["percentChange24h"])){
                                    switch($v["percentChange24h"])
                                        {
                                        case $v["percentChange24h"]>0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:green;"><span style="text-align: left;">';
                                         $html.=$v["percentChange24h"];   
                                         $html.='%</span></div></td>'; 
                                         break;
                                        case $v["percentChange24h"]<0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:red;"><span style="text-align: left;">';
                                         $html.=$v["percentChange24h"];   
                                         $html.='%</span></div></td>';
                                         break;
                                        
                                        }  
                                }else{
                                     $html.='<td style="padding-left:16px;">—</td>';
                                }
                                if(!empty($v["percentChange7d"])){                       
                                    switch($v["percentChange7d"])
                                        {
                                        case $v["percentChange7d"]>0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:green;"><span style="text-align: left;">';
                                         $html.=$v["percentChange7d"];   
                                         $html.='%</span></div></td>'; 
                                         break;
                                        case $v["percentChange7d"]<0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:red;"><span style="text-align: left;">';
                                         $html.=$v["percentChange7d"];   
                                         $html.='%</span></div></td>';
                                         break;
                                    
                                        }  
                                }else{
                                    $html.='<td style="padding-left:16px;">—</td>';
                                }

                                $html.='<td class="table-border-th percentChange7d" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: center; width: 80px; ">
                                            <a class="btn btn-primary btn-conf" data-toggle="modal" data-rec-id="bitcoin" data-target="#monitroPriceModal">设置</a>
                                        </td>';
                        $html.='</tr>';
                        
                        }//if前段结束
                    }else{
                    
                    }//else结束

                    $html.='

                    </tbody>
                </table>';

                $html.='
            </div>';
                echo $html;
            

            $html1.='';
            $page=$get;
            getPageHtml($page);
        $html1.='</div>';

        $html1.='
    </body>
    </html>
';  
    
    echo $html1;
    
}

html();

/**
  * 获取分页的HTML内容
  * @param integer $page 当前页
  * @param integer $pages 总页数
  * @param string $url 跳转url地址    最后的页数以 '&page=x' 追加在url后面
  * 
  * @return string HTML内容;
  */
 
function getPageHtml($page, $pages=15){
      //最多显示多少个页码
      $_pageNum = 6;
      //当前页面小于1 则为1
      // if(!isset($page)){
      //   $page=1;
      // }
      $page = $page<1?1:$page;
      //当前页大于总页数 则为总页数
      $page = $page > $pages ? $pages : $page;
      //页数小当前页 则为当前页
      $pages = $pages < $page ? $page : $pages;

      //计算开始页
      $_start = $page - floor($_pageNum/2);
      $_start = $_start<1 ? 1 : $_start;
      //计算结束页
      $_end = $page + floor($_pageNum/2);
      $_end = $_end>$pages? $pages : $_end;

      //当前显示的页码个数不够最大页码数，在进行左右调整
      $_curPageNum = $_end-$_start+1;
      //左调整
      if($_curPageNum<$_pageNum && $_start>1){  
           $_start = $_start - ($_pageNum-$_curPageNum);
           $_start = $_start<1 ? 1 : $_start;
           $_curPageNum = $_end-$_start+1;
      }
      //右边调整
      if($_curPageNum<$_pageNum && $_end<$pages){ 
           $_end = $_end + ($_pageNum-$_curPageNum);
           $_end = $_end>$pages? $pages : $_end;
      }

      $_pageHtml = '<ul id="ul1" class="pagination" style="position:absolute;right:154px;bottom:60px;">';
      /*if($_start == 1){
       $_pageHtml .= '<li><a title="第一页">«</a></li>';
      }else{
       $_pageHtml .= '<li><a  title="第一页" href="'.$url.'&page=1">«</a></li>';
      }*/
      if($page>1){
         $_pageHtml .= '<li><a  title="上一页" href="http://www.dom.com/index.php?&page='.($page-1).'">上一页</a></li>';
      }
      for ($i = $_start; $i <= $_end; $i++) {
       
           if($i == $page){
                $_pageHtml .= '<li class="active"><a>'.$i.'</a></li>';
           }else{
                $_pageHtml .= '<li><a href="http://www.dom.com/index.php?&page='.$i.'">'.$i.'</a></li>';
           }
      }
      /*if($_end == $pages){
       $_pageHtml .= '<li><a title="最后一页">»</a></li>';
      }else{
       $_pageHtml .= '<li><a  title="最后一页" href="'.$url.'&page='.$pages.'">»</a></li>';
      }*/
      if($page<$_end){
        $_pageHtml .= '<li><a  title="下一页" href="http://www.dom.com/index.php?&page='.($page+1).'">下一页</a></li>';
      }
        $_pageHtml .= '</ul>';
      echo $_pageHtml;
 }

