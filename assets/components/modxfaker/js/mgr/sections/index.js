Ext.onReady(function() {
    MODx.load({ xtype: 'modxfaker-page-home'});
});

Modxfaker.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [
            {
                xtype: 'modxfaker-panel-home',
                renderTo: 'modxfaker-panel-home-div'
            }
        ]
    });
    Modxfaker.page.Home.superclass.constructor.call(this,config);
};

Ext.extend(Modxfaker.page.Home, MODx.Component);
Ext.reg('modxfaker-page-home', Modxfaker.page.Home);