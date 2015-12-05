/*!
 * keel v5.4.0: A lightweight boilerplate for WordPress developers
 * (c) 2015 Chris Ferdinandi
 * MIT License
 * http://github.com/cferdinandi/keel
 */

 /*
  * classList.js: Cross-browser full element.classList implementation.
  * 1.1.20150312
  *
  * By Eli Grey, http://eligrey.com
  * License: Dedicated to the public domain.
  *   See https://github.com/eligrey/classList.js/blob/master/LICENSE.md
  */
 if("document" in self){if(!("classList" in document.createElement("_"))){(function(j){"use strict";if(!("Element" in j)){return}var a="classList",f="prototype",m=j.Element[f],b=Object,k=String[f].trim||function(){return this.replace(/^\s+|\s+$/g,"")},c=Array[f].indexOf||function(q){var p=0,o=this.length;for(;p<o;p++){if(p in this&&this[p]===q){return p}}return -1},n=function(o,p){this.name=o;this.code=DOMException[o];this.message=p},g=function(p,o){if(o===""){throw new n("SYNTAX_ERR","An invalid or illegal string was specified")}if(/\s/.test(o)){throw new n("INVALID_CHARACTER_ERR","String contains an invalid character")}return c.call(p,o)},d=function(s){var r=k.call(s.getAttribute("class")||""),q=r?r.split(/\s+/):[],p=0,o=q.length;for(;p<o;p++){this.push(q[p])}this._updateClassName=function(){s.setAttribute("class",this.toString())}},e=d[f]=[],i=function(){return new d(this)};n[f]=Error[f];e.item=function(o){return this[o]||null};e.contains=function(o){o+="";return g(this,o)!==-1};e.add=function(){var s=arguments,r=0,p=s.length,q,o=false;do{q=s[r]+"";if(g(this,q)===-1){this.push(q);o=true}}while(++r<p);if(o){this._updateClassName()}};e.remove=function(){var t=arguments,s=0,p=t.length,r,o=false,q;do{r=t[s]+"";q=g(this,r);while(q!==-1){this.splice(q,1);o=true;q=g(this,r)}}while(++s<p);if(o){this._updateClassName()}};e.toggle=function(p,q){p+="";var o=this.contains(p),r=o?q!==true&&"remove":q!==false&&"add";if(r){this[r](p)}if(q===true||q===false){return q}else{return !o}};e.toString=function(){return this.join(" ")};if(b.defineProperty){var l={get:i,enumerable:true,configurable:true};try{b.defineProperty(m,a,l)}catch(h){if(h.number===-2146823252){l.enumerable=false;b.defineProperty(m,a,l)}}}else{if(b[f].__defineGetter__){m.__defineGetter__(a,i)}}}(self))}else{(function(){var b=document.createElement("_");b.classList.add("c1","c2");if(!b.classList.contains("c2")){var c=function(e){var d=DOMTokenList.prototype[e];DOMTokenList.prototype[e]=function(h){var g,f=arguments.length;for(g=0;g<f;g++){h=arguments[g];d.call(this,h)}}};c("add");c("remove")}b.classList.toggle("c3",false);if(b.classList.contains("c3")){var a=DOMTokenList.prototype.toggle;DOMTokenList.prototype.toggle=function(d,e){if(1 in arguments&&!this.contains(d)===!e){return e}else{return a.call(this,d)}}}b=null}())}};


 /*! Houdini v8.1.0 | (c) 2015 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/houdini */
 !function(t,e){"function"==typeof define&&define.amd?define([],e(t)):"object"==typeof exports?module.exports=e(t):t.houdini=e(t)}("undefined"!=typeof global?global:this.window||this.global,function(t){"use strict";var e,n={},o="querySelector"in document&&"addEventListener"in t&&"classList"in document.createElement("_"),a={selector:"[data-collapse]",toggleActiveClass:"active",contentActiveClass:"active",initClass:"js-houdini",callback:function(){}},r=function(t,e,n){if("[object Object]"===Object.prototype.toString.call(t))for(var o in t)Object.prototype.hasOwnProperty.call(t,o)&&e.call(n,t[o],o,t);else for(var a=0,r=t.length;r>a;a++)e.call(n,t[a],a,t)},c=function(){var t={},e=!1,n=0,o=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(e=arguments[0],n++);for(var a=function(n){for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e&&"[object Object]"===Object.prototype.toString.call(n[o])?t[o]=c(!0,t[o],n[o]):t[o]=n[o])};o>n;n++){var r=arguments[n];a(r)}return t},s=function(t,e){var n,o,a=e.charAt(0);for("["===a&&(e=e.substr(1,e.length-2),n=e.split("="),n.length>1&&(o=!0,n[1]=n[1].replace(/"/g,"").replace(/'/g,"")));t&&t!==document;t=t.parentNode){if("."===a&&t.classList.contains(e.substr(1)))return t;if("#"===a&&t.id===e.substr(1))return t;if("["===a&&t.hasAttribute(n[0])){if(!o)return t;if(t.getAttribute(n[0])===n[1])return t}if(t.tagName.toLowerCase()===e)return t}return null},i=function(t,e){if(!t.classList.contains(e)){var n=t.querySelector("iframe"),o=t.querySelector("video");if(n){var a=n.src;n.src=a}o&&o.pause()}},l=function(t,e){if(!t.classList.contains(e.toggleActiveClass)&&t.hasAttribute("data-group")){var n=t.getAttribute("data-group"),o=document.querySelectorAll('[data-group="'+n+'"]');r(o,function(t){var n=document.querySelector(t.getAttribute("data-collapse"));t.classList.remove(e.toggleActiveClass),n.classList.remove(e.contentActiveClass)})}};n.toggleContent=function(t,e,n){var o=c(o||a,n||{}),r=document.querySelector(e);l(t,o),t.classList.toggle(o.toggleActiveClass),r.classList.toggle(o.contentActiveClass),i(r,o.contentActiveClass),o.callback(t,e)};var u=function(t){var o=s(t.target,e.selector);if(o){("a"===o.tagName.toLowerCase()||"button"===o.tagName.toLowerCase())&&t.preventDefault();var a=o.hasAttribute("data-collapse")?o.getAttribute("data-collapse"):o.parentNode.getAttribute("data-collapse");n.toggleContent(o,a,e)}};return n.destroy=function(){e&&(document.documentElement.classList.remove(e.initClass),document.removeEventListener("click",u,!1),e=null)},n.init=function(t){o&&(n.destroy(),e=c(a,t||{}),document.documentElement.classList.add(e.initClass),document.addEventListener("click",u,!1))},n});

 /*! Modals v8.1.0 | (c) 2015 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/modals */
 !function(e,t){"function"==typeof define&&define.amd?define([],t(e)):"object"==typeof exports?module.exports=t(e):e.modals=t(e)}("undefined"!=typeof global?global:this.window||this.global,function(e){"use strict";var t,o={},n="querySelector"in document&&"addEventListener"in e&&"classList"in document.createElement("_"),l="closed",a={selectorToggle:"[data-modal]",selectorWindow:"[data-modal-window]",selectorClose:"[data-modal-close]",modalActiveClass:"active",modalBGClass:"modal-bg",backspaceClose:!0,callbackOpen:function(){},callbackClose:function(){}},c=function(e,t,o){if("[object Object]"===Object.prototype.toString.call(e))for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&t.call(o,e[n],n,e);else for(var l=0,a=e.length;a>l;l++)t.call(o,e[l],l,e)},r=function(){var e={},t=!1,o=0,n=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(t=arguments[0],o++);for(var l=function(o){for(var n in o)Object.prototype.hasOwnProperty.call(o,n)&&(t&&"[object Object]"===Object.prototype.toString.call(o[n])?e[n]=r(!0,e[n],o[n]):e[n]=o[n])};n>o;o++){var a=arguments[o];l(a)}return e},s=function(e,t){var o,n,l=t.charAt(0);for("["===l&&(t=t.substr(1,t.length-2),o=t.split("="),o.length>1&&(n=!0,o[1]=o[1].replace(/"/g,"").replace(/'/g,"")));e&&e!==document;e=e.parentNode){if("."===l&&e.classList.contains(t.substr(1)))return e;if("#"===l&&e.id===t.substr(1))return e;if("["===l&&e.hasAttribute(o[0])){if(!n)return e;if(e.getAttribute(o[0])===o[1])return e}if(e.tagName.toLowerCase()===t)return e}return null},i=function(e,t){if(!e.classList.contains(t)){var o=e.querySelector("iframe"),n=e.querySelector("video");if(o){var l=o.src;o.src=l}n&&n.pause()}};o.openModal=function(e,t,o){var n=r(n||a,o||{}),c=document.querySelector(t),s=document.createElement("div");s.setAttribute("data-modal-bg",null),s.classList.add(n.modalBGClass),c.classList.add(n.modalActiveClass),document.body.appendChild(s),l="open",n.callbackOpen(e,t)},o.closeModals=function(e,t){var o=r(a,t||{}),n=document.querySelectorAll(o.selectorWindow+"."+o.modalActiveClass),s=document.querySelectorAll("[data-modal-bg]");(n.length>0||s.length>0)&&(c(n,function(e){e.classList.contains(o.modalActiveClass)&&(i(e),e.classList.remove(o.modalActiveClass))}),c(s,function(e){document.body.removeChild(e)}),l="closed",o.callbackClose())};var d=function(e){var n=e.target,a=s(n,t.selectorToggle),c=s(n,t.selectorClose),r=s(n,t.selectorWindow),i=e.keyCode;if(i&&"open"===l)(27===i||t.backspaceClose&&(8===i||46===i))&&o.closeModals(null,t);else if(n){if(r&&!c)return;a?(e.preventDefault(),o.openModal(a,a.getAttribute("data-modal"),t)):"open"===l&&(e.preventDefault(),o.closeModals(n,t))}};return o.destroy=function(){t&&(document.removeEventListener("click",d,!1),document.removeEventListener("touchstart",d,!1),document.removeEventListener("keydown",d,!1),t=null)},o.init=function(e){n&&(o.destroy(),t=r(a,e||{}),document.addEventListener("click",d,!1),document.addEventListener("touchstart",d,!1),document.addEventListener("keydown",d,!1))},o});



// http://www.sitepoint.com/the-right-way-to-make-a-dropdown-menu/

var branch;

 function dropdownMenu(navid)
 {
   var isopera = typeof window.opera != 'undefined';
   var isie = typeof document.all != 'undefined'
       && !isopera && navigator.vendor != 'KDE';
   if(isie && /msie 8/i.test(navigator.userAgent)) { isie = false; }
   var issafari = navigator.vendor == 'Apple Computer, Inc.';

   if (typeof document.getElementById == 'undefined'
       || (issafari && typeof window.XMLHttpRequest == 'undefined')
       || (isie && typeof document.uniqueID == 'undefined'))
   {
     return;
   }

   var rollover = new Image;
   //rollover.src = 'right-red.gif';
   rollover = new Image;
   //rollover.src = 'down-red.gif';

   var tree = document.getElementById(navid);
   if (tree)
   {
     var horiz = tree.className.indexOf('horizontal') != -1;
     branch = tree;
     var items = tree.getElementsByTagName('li');
     for (var i = 0; i < items.length; i++)
     {
       dropdownTrigger(tree, items[i], navid, isie, horiz);
     }

     if (!isopera)
     {
       cleanUselessWhitespace(tree);

       var keyevent = issafari || isie ? 'keydown' : 'keypress';
       attachEventListener(document, keyevent, function(e)
       {
         if(e.cmdKey || e.metaKey) { return true; }
         var target = typeof e.target != 'undefined'
             ? e.target : e.srcElement;
         if (tree.contains(target) && target.getAttribute('href'))
         {
           if (/^(37|38|39|40)$/.test(e.keyCode.toString()))
           {
             arrowKeyNavigation(tree, target, e.keyCode, horiz);

             if (typeof e.preventDefault != 'undefined')
             {
               e.preventDefault();
             }
             return false;
           }
         }
         return true;

       }, false);
     }

     var eles = typeof document.all != 'undefined'
         ? document.all : document.getElementsByTagName('*');
     for (i = 0; i < eles.length; i++)
     {
       attachEventListener(eles[i], 'focus', function(e)
       {
         var target = typeof e.target != 'undefined'
             ? e.target : e.srcElement;
         if (!tree.contains(target))
         {
           resetSiblingBranches(items[0]);
         }
       }, false);
     }

     if (!isie)
     {
       tree.contains = function(node)
       {
         if (node == null) { return false; }
         if (node == this) { return true; }
         else { return this.contains(node.parentNode); }
       };
     }
   }
 }

 function dropdownTrigger(tree, li, navid, isie, horiz)
 {
   var opentime, closetime;
   var a = li.getElementsByTagName('a')[0];
   var menu = li.getElementsByTagName('ul').length > 0
       ? li.getElementsByTagName('ul')[0] : null;
   var issub = li.parentNode.id == navid;

   if (menu)
   {
     li.className += (li.className == '' ? '' : ' ') + 'hasmenu';
   }

   attachEventListener(a, 'focus', function(e)
   {
     clearTimeout(closetime);

     a.className += (a.className == '' ? '' : ' ') + 'rollover';

     resetSiblingBranches(li);
     if (menu)
     {
       showMenu(menu, horiz, issub, li, a, isie);
     }

     var parent = li.parentNode;
     if (parent != tree)
     {
       if (parent.style.left == '' || parent.style.left == '-100em')
       {
         showAncestors(tree, parent, horiz, issub, isie);
       }

       if (toggleSelects('visible') && tree.contains(e.srcElement))
       {
         toggleSelects('hidden');
       }
     }
   }, false);

   attachEventListener(li, 'mouseover', function(e)
   {
     if (unwantedTextEvent()) { return; }
     clearTimeout(closetime);
     if (branch == li) { branch = null; }

     a.className += (a.className == '' ? '' : ' ') + 'rollover';

     var target = typeof e.target != 'undefined' ? e.target : window.event.srcElement;
     while (target.nodeName.toUpperCase() != 'LI')
     {
       target = target.parentNode;
     }
     if (target != li) { return; }

     if (menu)
     {
       opentime = window.setTimeout(function()
       {
         if (branch)
         {
           clearMenus(branch);
           branch = null;
         }

         resetSiblingBranches(li);
         showMenu(menu, horiz, issub, li, a, isie);
       }, 250);
     }
   }, false);

   attachEventListener(li, 'mouseout', function(e)
   {
     if (unwantedTextEvent()) { return; }

     var related = typeof e.relatedTarget != 'undefined' ? e.relatedTarget : window.event.toElement;
     if (!li.contains(related))
     {
       clearTimeout(opentime);
       branch = li;

       a.className = a.className.replace(/ ?rollover/g, '');
       if (menu)
       {
         closetime = window.setTimeout(function()
         {
           menu.style.left = '-100em';

           if (toggleSelects('visible') && tree.contains(related))
           {
             toggleSelects('hidden');
           }
           else
           {
             removeIframeLayer(menu);
           }

         }, 600);
       }
     }
   }, false);

   if (!isie)
   {
     li.contains = function(node)
     {
       if (node == null) { return false; }
       if (node == this) { return true; }
       else { return this.contains(node.parentNode); }
     };
   }
 }

 function showMenu(menu, horiz, issub, li, a, isie)
 {
   menu.style.left = horiz
       ? (isie ? li.offsetLeft + 'px' : 'auto')
       : '0';

   menu.style.top = horiz && issub
       ? (isie ? a.offsetHeight + 'px' : 'auto')
       : (isie ? li.offsetTop + 'px' : '0');

   repositionMenu(menu);

   if (typeof document.uniqueID != 'undefined')
   {
     createIframeLayer(menu);
   }
 }

 function showAncestors(tree, menu, horiz, issub, isie)
 {
   clearMenus(tree);

   while (menu.id != tree.id)
   {
     var li = menu.parentNode;
     var a = li.getElementsByTagName('a')[0];

     showMenu(menu, horiz, issub, li, a, isie);

     menu = li.parentNode;
   }
 }

 function resetSiblingBranches(trigger)
 {
   clearMenus(trigger.parentNode);

   var links = trigger.parentNode.getElementsByTagName('a');
   for (var i = 0; i < links.length; i++)
   {
     links[i].className = links[i].className.replace(/ ?rollover/g, '');
   }
 }

 function cleanUselessWhitespace(node)
 {
   for (var x = 0; x < node.childNodes.length; x++)
   {
     var child = node.childNodes[x];
     if (child.nodeType == 3 && !/\S/.test(child.nodeValue))
     {
       node.removeChild(node.childNodes[x]);
       x--;
     }
     if (child.nodeType == 1)
     {
       cleanUselessWhitespace(child);
     }
   }
 }

 function mapKeyCode(keycode, type)
 {
   switch (type)
   {
     case 0:
       if (keycode == 37) keycode = 39;
       else if (keycode == 39) keycode = 37;
       break;

     case 1:
       if (keycode % 2) keycode++;
       else keycode--;
       break;

     case 2:
       if (keycode == 38) { keycode = 37; }
       break;
   }

   return keycode;
 }

 function arrowKeyNavigation(tree, link, keycode, horiz)
 {
   var li = link.parentNode;
   var menu = li.getElementsByTagName('ul').length > 0
       ? li.getElementsByTagName('ul')[0] : null;
   var parent = li.parentNode;

   if (menu)
   {
     if (getRoughPosition(menu, 'x')
         < getRoughPosition(li.parentNode, 'x'))
     {
       keycode = mapKeyCode(keycode, 0);
     }
   }
   else if (parent != tree)
   {
     if (getRoughPosition(parent.parentNode.parentNode, 'x')
         > getRoughPosition(parent, 'x'))
     {
       keycode = mapKeyCode(keycode, 0);
     }
   }

   if (horiz)
   {
     if (parent == tree)
     {
       keycode = mapKeyCode(keycode, 1);
     }
     else if (parent.parentNode.parentNode == tree
         && li == li.parentNode.firstChild)
     {
       keycode = mapKeyCode(keycode, 2);
     }
   }

   switch (keycode)
   {
     case 37:
       parent = parent.parentNode;
       if (tree.parentNode == parent) { parent = null; }
       if (parent)
       {
         parent.firstChild.focus();
       }
       break;

     case 38:
       var previous = li.previousSibling;
       if (!previous)
       {
         previous = li.parentNode.childNodes
             [li.parentNode.childNodes.length - 1];
       }
       previous.firstChild.focus();
       break;

     case 39:
       if (menu)
       {
         menu.firstChild.firstChild.focus();
       }
       break;

     case 40:
       var next = li.nextSibling;
       if (!next)
       {
         next = li.parentNode.childNodes[0];
       }
       next.firstChild.focus();
       break;
   }
 }

 function clearMenus(root)
 {
   var menus = root.getElementsByTagName('ul');
   for (var i = 0; i < menus.length; i++)
   {
     menus[i].style.left = '-100em';
     removeIframeLayer(menus[i]);
   }
 }

 function unwantedTextEvent()
 {
   return (navigator.vendor == 'Apple Computer, Inc.'
       && (event.target == event.relatedTarget.parentNode
       || (event.eventPhase == 3
       && event.target.parentNode == event.relatedTarget)));
 }

 function getRoughPosition(ele, dir)
 {
   var pos = dir == 'x' ? ele.offsetLeft : ele.offsetTop;
   var tmp = ele.offsetParent;
   while (tmp != null)
   {
     pos += dir == 'x' ? tmp.offsetLeft : tmp.offsetTop;
     tmp = tmp.offsetParent;
   }
   return pos;
 }

 function getViewportSize()
 {
   var size = [0,0];

   if (typeof window.innerWidth != 'undefined')
   {
     size = [
         window.innerWidth,
         window.innerHeight
     ];
   }
   else if (typeof document.documentElement != 'undefined'
       && typeof document.documentElement.clientWidth != 'undefined'
       && document.documentElement.clientWidth != 0)
   {
     size = [
         document.documentElement.clientWidth,
         document.documentElement.clientHeight
     ];
   }
   else
   {
     size = [
         document.getElementsByTagName('body')[0].clientWidth,
         document.getElementsByTagName('body')[0].clientHeight
     ];
   }

   return size;
 }

 function repositionMenu(menu)
 {
   var extent = [
       getRoughPosition(menu, 'x') + menu.offsetWidth + 25,
       getRoughPosition(menu, 'y') + menu.offsetHeight + 25
   ];
   var viewsize = getViewportSize();

   if (extent[0] > viewsize[0])
   {
     var offset = menu.offsetWidth
         + menu.parentNode.parentNode.offsetWidth;
     var inset = menu.parentNode.offsetWidth
         - menu.offsetLeft;

     menu.style.left = (0 - offset + (inset * 2)) + 'px';
   }

   if (extent[1] > viewsize[1])
   {
     var current = parseInt(menu.style.top, 10);
     var difference = extent[1] - viewsize[1];

     menu.style.top = (current - difference) + 'px';
   }
 }

 function createIframeLayer(menu)
 {
   if (!toggleSelects('hidden'))
   {
     var layer = document.createElement('iframe');
     layer.tabIndex = '-1';
     layer.src = 'javascript:false;';
     menu.parentNode.appendChild(layer);

     layer.style.left = menu.offsetLeft + 'px';
     layer.style.top = menu.offsetTop + 'px';
     layer.style.width = menu.offsetWidth + 'px';
     layer.style.height = menu.offsetHeight + 'px';
   }
 }

 function removeIframeLayer(menu)
 {
   if (!toggleSelects('visible'))
   {
     var layers = menu.parentNode.getElementsByTagName('iframe');
     while (layers.length > 0)
     {
       layers[0].parentNode.removeChild(layers[0]);
     }
   }
 }

 function toggleSelects(vis)
 {
   if (typeof document.uniqueID != 'undefined'
       && typeof document.body.style.scrollbarTrackColor == 'undefined')
   {
     var selects = document.getElementsByTagName('select');
     for (var i = 0; i < selects.length; i++)
     {
       selects[i].style.visibility = vis;
     }

     return true;
   }

   return false;
 }

 function attachEventListener(target, eventType, functionRef, capture)
 {
   if (typeof target.addEventListener != 'undefined')
   {
     target.addEventListener(eventType, functionRef, capture);
   }
   else if (typeof target.attachEvent != 'undefined')
   {
     target.attachEvent('on' + eventType, functionRef);
   }
   else
   {
     eventType = 'on' + eventType;

     if (typeof target[eventType] == 'function')
     {
       var oldListener = target[eventType];

       target[eventType] = function()
       {
         oldListener();

         return functionRef();
       }
     }
     else
     {
       target[eventType] = functionRef;
     }
   }

   return true;
 }

 function addLoadListener(fn)
 {
   if (typeof window.addEventListener != 'undefined')
   {
     window.addEventListener('load', fn, false);
   }
   else if (typeof document.addEventListener != 'undefined')
   {
     document.addEventListener('load', fn, false);
   }
   else if (typeof window.attachEvent != 'undefined')
   {
     window.attachEvent('onload', fn);
   }
   else
   {
     var oldfn = window.onload;
     if (typeof window.onload != 'function')
     {
       window.onload = fn;
     }
     else
     {
       window.onload = function()
       {
         oldfn();
         fn();
       };
     }
   }
 }

 addLoadListener(function() { dropdownMenu('navigation'); });

 // (function () {
 //
 //
 //     var toggleState = function (elem, state) {
 //         var elem = document.querySelector(elem);
 //         elem.setAttribute('aria-'+state,
 //           elem.getAttribute('aria-'+state) === "true" ? "false" : "true");
 //     };
 //
 //     document.querySelector('.nav-toggle').onClick = function (e) {
 //         toggleState('ul.horizontal', 'expanded');
 //         e.preventDefault();
 //     };
 //
 // })();
