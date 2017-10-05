(function() {  


    tinymce.create('tinymce.plugins.alert', {  
        init : function(ed, url) {  
            ed.addButton('alert', {  
                title : 'Add a Alert',  
                image : url+'/alert.png',  
                onclick : function() {  
                     ed.selection.setContent('[alert type="error|success|info" close="true"]Alert message goes here[/alert]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('alert', tinymce.plugins.alert); 


    tinymce.create('tinymce.plugins.label', {  
        init : function(ed, url) {  
            ed.addButton('label', {  
                title : 'Add a Label',  
                image : url+'/label.png',  
                onclick : function() {  
                     ed.selection.setContent('[label type="success|warning|important|info|inverse"]Label text goes here[/label]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('label', tinymce.plugins.label); 


    tinymce.create('tinymce.plugins.badge', {  
        init : function(ed, url) {  
            ed.addButton('badge', {  
                title : 'Add a Badge',  
                image : url+'/badge.png',  
                onclick : function() {  
                     ed.selection.setContent('[badge type="success|warning|important|info|inverse"]Badge text goes here[/badge]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('badge', tinymce.plugins.badge); 


    tinymce.create('tinymce.plugins.well', {  
        init : function(ed, url) {  
            ed.addButton('well', {  
                title : 'Add a Well',  
                image : url+'/well.png',  
                onclick : function() {  
                     ed.selection.setContent('[well]Well content goes here[/well]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('well', tinymce.plugins.well); 


    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add a Button',  
                image : url+'/button.png',  
                onclick : function() {  
                     ed.selection.setContent('[button url="http://www.facebook.com" style="default|primary|info|success|warning|danger|inverse" size="default|large|small|mini" block="true|false" target="_blank to open in a new window _self for same window" icon="check"]Button text goes here[/button]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);


    tinymce.create('tinymce.plugins.blockquote', {  
        init : function(ed, url) {  
            ed.addButton('blockquote', {  
                title : 'Add a Blockquote',  
                image : url+'/blockquote.png',  
                onclick : function() {  
                     ed.selection.setContent('[blockquote source="Name of the soruce"]Blockquote text goes here[/blockquote]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('blockquote', tinymce.plugins.blockquote);


    tinymce.create('tinymce.plugins.syntax', {  
        init : function(ed, url) {  
            ed.addButton('syntax', {  
                title : 'Add a Syntax highlighting',  
                image : url+'/syntax.png',  
                onclick : function() {  
                     ed.selection.setContent('[syntax type="html|php|js|css"]Code you want to show goes here[/syntax]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('syntax', tinymce.plugins.syntax);


    tinymce.create('tinymce.plugins.tooltip', {  
        init : function(ed, url) {  
            ed.addButton('tooltip', {  
                title : 'Add a Tooltip',  
                image : url+'/tooltip.png',  
                onclick : function() {  
                     ed.selection.setContent('[tooltip text="Tooltip Text goes here" trigger="hover|click"]Text goes here[/tooltip]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('tooltip', tinymce.plugins.tooltip);  


    tinymce.create('tinymce.plugins.popover', {  
        init : function(ed, url) {  
            ed.addButton('popover', {  
                title : 'Add a Popover',  
                image : url+'/popover.png',  
                onclick : function() {  
                     ed.selection.setContent('[popover title="Popover Title goes here" trigger="hover|click" placement="top|bottom|left|right" content="Popover content goes here"]Text goes here[/popover]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('popover', tinymce.plugins.popover);  

    var fullurl;
    tinymce.create('tinymce.plugins.accordion', {  
        init : function(ed, url) {  
            fullurl = url;
            ed.addButton('accordion', {  
                title : 'Add Accordion',  
                image : url+'/accordion.png',  
                onclick : function() {  
                     ed.selection.setContent('[accordion]<br />[accordion-group title="Title goes here"]Text goes here[/accordion-group]<br />[accordion-group title="Title goes here"]Text goes here[/accordion-group]<br />[accordion-group title="Title goes here"]Text goes here[/accordion-group]<br />[/accordion]');  
                  }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('accordion', tinymce.plugins.accordion);  
    
    tinymce.create('tinymce.plugins.divider', {  
        init : function(ed, url) {  
            ed.addButton('divider', {  
                title : 'Add a Alert',  
                image : url+'/divider.png',  
                onclick : function() {  
                     ed.selection.setContent('[divider type="white|thin|thick|short|dotted|dashed" spacing="10"]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('divider', tinymce.plugins.divider); 

    tinymce.create('tinymce.plugins.columns', {
        createControl: function(n, cm) {
            switch (n) {
                case 'columns':
                    var c = cm.createSplitButton('mysplitbutton', {
                        title : 'Columns',
                        image : fullurl+'/columns.png',
                        onclick : function() {}
                    });

                    c.onRenderMenu.add(function(c, m) {
                        m.add({title : 'Columns', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                        m.add({title : 'Half', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[two_first]<br /><br />[/two_first][two_second]<br /><br />[/two_second]');  
                        }});

                        m.add({title : 'Two/One', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[two_one_first]<br /><br />[/two_one_first][two_one_second]<br /><br />[/two_one_second]');  
                        }});

                        m.add({title : 'One/Two', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[one_two_first]<br /><br />[/one_two_first][one_two_second]<br /><br />[/one_two_second]');  
                        }});

                        m.add({title : 'Three', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[three_first]<br /><br />[/three_first][three_second]<br /><br />[/three_second][three_third]<br /><br />[/three_third]');  
                        }});

                        m.add({title : 'Four', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[four_first]<br /><br />[/four_first][four_second]<br /><br />[/four_second][four_third]<br /><br />[/four_third][four_fourth]<br /><br />[/four_fourth]');  
                        }});

                        m.add({title : 'One/One/Two', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[one_one_two_first]<br /><br />[/one_one_two_first][one_one_two_second]<br /><br />[/one_one_two_second][one_one_two_third]<br /><br />[/one_one_two_third]');  
                        }});

                        m.add({title : 'Two/One/One', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[two_one_one_first]<br /><br />[/two_one_one_first][two_one_one_second]<br /><br />[/two_one_one_second][two_one_one_third]<br /><br />[/two_one_one_third]');  
                        }});

                        m.add({title : 'One/Two/One', onclick : function() {
                            tinyMCE.activeEditor.selection.setContent('[one_two_one_first]<br /><br />[/one_two_one_first][one_two_one_second]<br /><br />[/one_two_one_second][one_two_one_third]<br /><br />[/one_two_one_third]');  
                        }});
                    });

                  // Return the new splitbutton instance
                  return c;
            }

            return null;
        }
    });
    tinymce.PluginManager.add('columns', tinymce.plugins.columns);

})();