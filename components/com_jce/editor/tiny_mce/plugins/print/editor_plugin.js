/* JCE Editor - 2.5.0 beta4 | 04 March 2015 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2015 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function(){tinymce.create("tinymce.plugins.Print",{init:function(a,b){a.addCommand("mcePrint",function(){a.getWin().print()});a.addButton("print",{title:"print.desc",cmd:"mcePrint"})},getInfo:function(){return{longname:"Print",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/print",version:tinymce.majorVersion+"."+tinymce.minorVersion}}});tinymce.PluginManager.add("print",tinymce.plugins.Print)})();