$(document).ready(function(){"use strict";var e=document.querySelector(".newYear"),t=document.querySelector(".newYearDesktop"),o=document.querySelector(".newYearMobile"),n=(e.innerHTML=(new Date).getFullYear(),t.innerHTML=(new Date).getFullYear(),o.innerHTML=(new Date).getFullYear(),$(window).on("scroll",function(){100<=$(window).scrollTop()?$("#navigationBar").addClass("sticky-nav"):$("#navigationBar").removeClass("sticky-nav")}),$(".testimonial-slider").slick({slidesToShow:1,slidesToScroll:1,prevArrow:'<button type="button" class="slick-previous"><i class="ph-arrow-left"></i> Previous</button>',nextArrow:'<button type="button" class="slick-next">Next <i class="ph-arrow-right"></i></button>',autoplay:!0,autoplaySpeed:2e3}),$(".feedback-slider").slick({infinite:!1,slidesToShow:2,slidesToScroll:1,dots:!1,prevArrow:'<button type="button" class="slick-previous"><i class="ph-arrow-left"></i> Previous</button>',nextArrow:'<button type="button" class="slick-next">Next <i class="ph-arrow-right"></i></button>',responsive:[{breakpoint:992,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".grid").isotope({}));$(".filters-button-group").on("click","button",function(){var e=$(this).attr("data-filter");n.isotope({filter:e})}),$(".button-group").each(function(e,t){var o=$(t);o.on("click","button",function(){o.find(".is-checked").removeClass("is-checked"),$(this).addClass("is-checked")})}),$(".counter--content-number").counterUp({}),window.innerWidth<768&&$(function(){$("body").on("click touchstart",".load-more",function(e){e.preventDefault(),$(".next-team-member:hidden").slice(0,2).slideDown(),0==$(".next-team-member:hidden").length&&$(".load-more").css("display","none")})}),$(function(){$.scrollIt({scrollTime:600,activeClass:"active",topOffset:-175})});[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)});$(window).on("scroll",function(){var e=$(window).scrollTop();e<=450?$(".blog-single-share").hide():$(".blog-single-share").show(),470<=e?($("#blog-share").addClass("active"),$(".tooltip").addClass("active")):($("#blog-share").removeClass("active"),$(".tooltip").removeClass("active"))}),$(".property-details-banner").magnificPopup({delegate:"a",gallery:{enabled:!0},type:"image"}),$(".property-details-banner-for").slick({slidesToShow:1,slidesToScroll:1,arrows:!1,fade:!0,asNavFor:".property-details-banner-nav"}),$(".property-details-banner-nav").slick({slidesToShow:2,slidesToScroll:1,asNavFor:".property-details-banner-for",dots:!1,arrows:!1,focusOnSelect:!0,vertical:!0,responsive:[{breakpoint:992,settings:{vertical:!1}},{breakpoint:480,settings:{slidesToShow:1}}]}),null!=document.getElementById("property-details")&&992<=screen.width&&(e=$(".property-details-banner-nav .slick-slide:not(.slick-cloned)").length,console.log(e),document.getElementById("totalslide").innerHTML=e+" photos"),AOS.init()});var selectBtn=document.getElementsByClassName("customdropdown"),dropdownMenu=document.getElementsByClassName("dropdownMenu");for(i=0;i<selectBtn.length;i++)selectBtn[i].onclick=function(){if(-1<this.className.indexOf("active"))for(j=0;j<selectBtn.length;j++)removeClass(selectBtn[j],"active");else addClass(this,"active")};for(i=0;i<dropdownMenu.length;i++){var child=dropdownMenu[i].children;for(j=0;j<child.length;j++)child[j].onclick=function(){var e=this.innerHTML;this.parentNode.previousElementSibling.children[0].innerHTML=e,toggleClass(this.parentNode,"showMenu")}}function toggleClass(e,t){var o=e.className;-1<o.indexOf(t)?e.className=o.replace(" "+t,""):e.className=o+" "+t}function addClass(e,t){var o=e.className;o.indexOf(t)<1&&(e.className=o+" "+t)}function removeClass(e,t){var o=e.className;-1<o.indexOf(t)&&(e.className=o.replace(" "+t,""))}window.addEventListener("click",function(e){for(i=0;i<selectBtn.length;i++)e.target!=selectBtn[i].children[0]&&removeClass(selectBtn[i],"active")}),$(".filter-content .dropdown-menu").click(function(e){e.stopPropagation()}),$("a.close-filter-content").click(function(){$("#dlDropDown").dropdown("toggle")});