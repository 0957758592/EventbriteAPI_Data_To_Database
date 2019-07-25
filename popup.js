/*
 * MIT License
 * 
 * Copyright (c) 2019 Roman Danilov
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 */

"use strict";let servernames=$('#servername').val();let dbnames=$('#dbname').val();let usernames=$('#username').val();let passwords=$('#password').val();let tokens=$('#token').val();let locations=$('#location').val();let categories=$('#categories').val();let subcategories=$('#subcategories').val();let price=$('#price').val();let sorting=$('#sorting').val();let locationArray=[];let categoriesArray=[];let subcategoriesArray=[];const prices=[{id:1,name:"paid"},{id:2,name:"free"}];const sortByDate=[{id:1,name:"date",sorted:"ascending"},{id:2,name:"-date",sorted:"descending"}];$('#token').change(()=>{checkTokens();})
function checkTokens(){$.ajax({url:'https://www.eventbriteapi.com/v3/system/countries/?token='+$('#token').val(),complete:function(xhr,statusText){if(xhr.status===200){continueScript();}else{alert('Check your token');$('#location, #categories, #subcategories, #price, #sorting').empty();return;}}});};
function checkDatabase(){$.post("http://luo.cu.ma/events/checkDatabaseConnection.php",{servername:$('#servername').val(),dbname:$('#dbname').val(),username:$('#username').val(),password:$('#password').val()},function(status,data){if(status==="Connection failed"){alert('Check your Database Settings');return;}else{startParse();}});}
function continueScript(){if(locationArray.length===0){let currPage=1;(function getLocation(){$.get('https://www.eventbriteapi.com/v3/system/countries/?token='+$('#token').val()+'&page='+currPage,locate);function locate(res){let locates=res.countries;let pageCount=res.page_count;for(let e of locates){locationArray.push(e.label);}
if(pageCount!=currPage){currPage++;getLocation();}
createOptionLoc(locates);};})();}
if(categoriesArray.length===0){let currPage=1;(function getCategories(currPage){$.get('https://www.eventbriteapi.com/v3/categories/?token='+$('#token').val()+'&page='+currPage,cat);function cat(res){let category=res.categories;let pageCount=res.page_count;for(let c of category){categoriesArray.push({id:c.id,name:c.name});}
if(pageCount!=currPage){currPage++;getCategories(currPage);}
createOptionCat(category);};})();}
if(subcategoriesArray.length===0){let currPage=1;(function getSubCategories(){$.get('https://www.eventbriteapi.com/v3/subcategories/?token='+$('#token').val()+'&page='+currPage,sub);function sub(res){let subcategory=res.subcategories;let pageCount=res.page_count;for(let c of subcategory){subcategoriesArray.push({id:c.id,name:c.name,parentid:c.parent_category.id,parentname:c.parent_category.name});}
if(pageCount!=currPage){currPage++;getSubCategories();}};})();}
let createOptionCat=(array)=>{$("#categories").append($("<option>").attr("value","0").text("---Select Category---"));for(let c of array){$("#categories").append($("<option>").attr({"value":c.id,"valueid":c.id}).text(c.name));}
$("#categories").change((array)=>{$("#subcategories").empty();for(let sub of subcategoriesArray){if($("#categories").val()===sub.parentid){$("#subcategories").append($("<option>").attr({"value":sub.id,"parentid":sub.parentid}).text(sub.name));}}})}
let createOptionLoc=(array)=>{for(let c of array){$('#location').append($("<option>").attr("value",c.label).text(c.label));}}
let createSortOption=(()=>{for(let c of sortByDate){$("#sorting").append($("<option>").attr("value",c.name).text(c.sorted));}
for(let c of prices){$("#price").append($("<option>").attr("value",c.name).text(c.name));}})();}
let startParse=()=>{if($('#token').val()!=null&&$('#servername').val()!=null&&$('#dbname').val()!=null&&$('#username').val()!=null&&$('#password').val()!=null&&$('#location').val()!=null&&$('#categories').val()!=null&&$('#subcategories').val()!=null&&$('#price').val()!=null&&$('#sorting').val()!=null){chrome.runtime.sendMessage({token:['tokens',tokens=$('#token').val(),servernames=$('#servername').val(),dbnames=$('#dbname').val(),usernames=$('#username').val(),passwords=$('#password').val(),locations=$('#location').val(),categories=$('#categories').val(),subcategories=$('#subcategories').val(),price=$('#price').val(),sorting=$('#sorting').val()]},start());function start(){window.close();console.log('start');}}else{alert('Should feel all the fields!');return;}}
$('#button').bind('click',function(){checkDatabase();});
