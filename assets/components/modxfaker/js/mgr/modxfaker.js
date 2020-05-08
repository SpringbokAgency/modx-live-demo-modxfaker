let Modxfaker = function (config) {
    config = config || {};
    Modxfaker.superclass.constructor.call(this, config);
};
Ext.extend(Modxfaker, Ext.Component, {
    page: {},
    window: {},
    grid: {},
    tree: {},
    panel: {},
    combo: {},
    config: {},
});
Ext.reg("modxfaker", Modxfaker);
Modxfaker = new Modxfaker();