Modxfaker.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        border: false,
        baseCls: "modx-formpanel",
        cls: "container",
        items: [
            {
                html: "<h2>" + _("modxfaker.home.page_title") + "</h2>",
                border: false,
                cls: "modx-page-header",
            },
            {
                xtype: 'button',
                text: 'Create fake resources',
                listeners: {
                    'click': {
                        fn: function() {
                            var title = 'How many resources?';
                            var msg = 'Please enter a number';
                            var myCallback = function(btn, text) {
                                if (text) {
                                    MODx.Ajax.request({
                                        url: Modxfaker.config.connector_url
                                        ,params: {
                                            action: 'populate',
                                            amount: text
                                        }
                                        ,listeners: {
                                            'success':{fn:function() {
                                                    console.fireEvent('complete');
                                                },scope:this}
                                        }
                                    });
                                }
                            }
                            Ext.MessageBox.prompt(title,msg,myCallback);
                        },
                        scope: this
                    }
                }
            }
        ],
    });
    Modxfaker.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(Modxfaker.panel.Home, MODx.Panel);
Ext.reg("modxfaker-panel-home", Modxfaker.panel.Home);