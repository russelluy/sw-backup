/* Floatbox v3.53.0 */
Floatbox.prototype.zoomIn=function(e){var h=this,g=h.itemToShow,a=h.fbZoomDiv.style;if(!e){h.clearTimeout("slowLoad");h.fbZoomLoader.style.display="none";a.display=h.fbZoomImg.style.display="";if(g.popup){g.popupLocked=false;g.anchor.onmouseout()}var c=h.innerBorder+h.realBorder-h.zoomPopBorder,b=function(){h.fbZoomImg.src=g.href;h.setSize({id:"fbZoomDiv",width:h.pos.fbMainDiv.width,height:h.pos.fbMainDiv.height,left:h.pos.fbBox.left+h.pos.fbMainDiv.left+c,top:h.pos.fbBox.top+h.pos.fbMainDiv.top+c},function(){h.zoomIn(1)})};return h.setOpacity(h.fbOverlay,h.overlayOpacity,h.overlayFadeDuration,b)}if(e===1){var f={id:"fbBox",left:h.pos.fbBox.left,top:h.pos.fbBox.top,width:h.pos.fbBox.width,height:h.pos.fbBox.height};var i=2*(h.realBorder-h.zoomPopBorder+h.cornerRadius);h.pos.fbBox.left=h.pos.fbZoomDiv.left+h.cornerRadius;h.pos.fbBox.top=h.pos.fbZoomDiv.top+h.cornerRadius;h.pos.fbBox.width=h.pos.fbZoomDiv.width-i;h.pos.fbBox.height=h.pos.fbZoomDiv.height-i;h.fbBox.style.visibility="";var b=function(){h.restore(function(){h.zoomIn(2)})};return h.setSize(f,b)}var d=function(){a.display="none";h.fbZoomImg.src=h.blank;a.left=a.width=a.height=h.fbZoomImg.width=h.fbZoomImg.height="0";a.top="-9999px";h.showContent()};h.timeouts.showContent=setTimeout(d,10)};Floatbox.prototype.zoomOut=function(b){var c=this;if(!b){c.fbZoomImg.src=c.currentItem.href;c.setPosition(c.fbBox,"absolute");var d=c.realBorder+c.innerBorder-c.zoomPopBorder;return c.setSize({id:"fbZoomDiv",width:c.pos.fbMainDiv.width,height:c.pos.fbMainDiv.height,left:c.pos.fbBox.left+c.realPadding+d,top:c.pos.fbBox.top+c.upperSpace-(c.cornerRadius-c.roundBorder)+d},function(){c.zoomOut(1)})}if(b===1){c.fbZoomDiv.style.display=c.fbZoomImg.style.display="";c.fbCanvas.style.visibility="hidden";return c.collapse(function(){c.zoomOut(2)})}if(b===2){if(c.shadowSize){c.fbShadows.style.display="none"}var d=2*(c.realBorder-c.zoomPopBorder+c.cornerRadius);return c.setSize({id:"fbBox",left:c.pos.fbZoomDiv.left+c.cornerRadius,top:c.pos.fbZoomDiv.top+c.cornerRadius,width:c.pos.fbZoomDiv.width-d,height:c.pos.fbZoomDiv.height-d},function(){c.zoomOut(3)})}c.fbBox.style.visibility="hidden";var a=function(){c.fbZoomImg.src=c.pos.thumb.src;c.end()};c.setSize({id:"fbZoomDiv",left:c.pos.thumb.left,top:c.pos.thumb.top,width:c.pos.thumb.width,height:c.pos.thumb.height},a)};
