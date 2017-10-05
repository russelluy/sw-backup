/*!
 * jQuery Collapse-O-Matic v1.2.3
 * http://www.twinpictures.de/collapse-o-matic/
 *
 * Copyright 2011, Twinpictures
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, blend, trade,
 * bake, hack, scramble, difiburlate, digest and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

jQuery(document).ready(function(){jQuery('.collapseomatic:not(.close)').each(function(index){var thisid=jQuery(this).attr('id');jQuery('#target-'+thisid).css('display','none')});jQuery('.collapseomatic').hover(function(){jQuery(this).addClass("hover")},function(){jQuery(this).removeClass("hover")});jQuery('.collapseomatic').click(function(){jQuery(this).toggleClass('close');var title=jQuery(this).attr('title');var htmlstr=jQuery(this).html();if(title!=htmlstr){jQuery(this).attr('title',htmlstr);jQuery(this).html(title)}var id=jQuery(this).attr('id');jQuery('#target-'+id).slideToggle('fast',function(){});if(jQuery(this).attr('rel')!==undefined){var rel=jQuery(this).attr('rel');if(rel.indexOf('-highlander')!='-1'){closeOtherMembers(rel,id)}else{closeOtherGroups(rel)}}});function closeOtherGroups(rel){jQuery('.collapseomatic[rel!="'+rel+'"]').each(function(index){if(jQuery(this).hasClass('close')&&jQuery(this).attr('rel')!==undefined){jQuery(this).removeClass('close');var id=jQuery(this).attr('id');jQuery('#target-'+id).slideToggle('fast',function(){})}})}function closeOtherMembers(rel,id){jQuery('.collapseomatic[rel="'+rel+'"]').each(function(index){if(jQuery(this).attr('id')!=id&&jQuery(this).hasClass('close')&&jQuery(this).attr('rel')!==undefined){jQuery(this).removeClass('close');var thisid=jQuery(this).attr('id');jQuery('#target-'+thisid).slideToggle('fast',function(){})}})}var myFile=document.location.toString();if(myFile.match('#')){var myAnchor='#'+myFile.split('#')[1];jQuery(myAnchor).click()}jQuery('.expandall').click(function(){jQuery('.collapseomatic:not(.close)').each(function(index){jQuery(this).addClass('close');var thisid=jQuery(this).attr('id');jQuery('#target-'+thisid).slideToggle('fast',function(){})})});jQuery('.collapseall').click(function(){jQuery('.collapseomatic.close').each(function(index){jQuery(this).removeClass('close');var thisid=jQuery(this).attr('id');jQuery('#target-'+thisid).slideToggle('fast',function(){})})})});