var bridge = function (leafPath) {
    window.rhubarb.viewBridgeClasses.ViewBridge.apply(this, arguments);
};

bridge.prototype = new window.rhubarb.viewBridgeClasses.ViewBridge();
bridge.prototype.constructor = bridge;

bridge.prototype.attachEvents = function () {
    var input = document.querySelector('#' + this.leafPath + '_Query');
    var self = this;
    var searchTimeout = null;
    input.onkeyup = function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function(){
            self.queryProducts(input.value)
        }, 400);
    };
};

bridge.prototype.queryProducts = function(query) {
    this.raiseServerEvent('search', query, function(products){
        var text = '';
        for (var i = 0; i < products.length; i++) {
            text += '<a href="' + products[i].Href + '"><li>' + products[i].Name  + '</li>' + '</a>'    ;
        }
        document.querySelector('.search-response').innerHTML = text;
    });
};

window.rhubarb.viewBridgeClasses.SearchViewBridge = bridge;