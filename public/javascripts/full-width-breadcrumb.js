/*
var item_count; 

$j(document).on("click", "#more", function(e) {
  e.preventDefault();    
  if($j(this).hasClass('moreactive')){
    $j('.secondlevelnextall').slideUp('500', function() {
      $j('.secondlevelnextall').css('overflow','');
      $j('#more').removeClass("moreactive");
    }); 
  }
  else{
    $j('#more').addClass("moreactive");
    $j('.secondlevelnextall').slideDown('500', function() {
      $j('.secondlevelnextall').css('overflow','');
    });
  } 
  
  $j('.new-bread-div > a,.bread-active-paren > a').removeClass('bread-active');
  $j('.new-bread-div > a,.bread-active-paren > a').parent().removeClass('bread-active-parent');
  $j('.new-bread-div > a,.bread-active-paren > a').siblings('ul').slideUp('500', function() {      
    $j('.new-bread-div > a,.bread-active-paren > a').siblings('ul').css('overflow','');
    $j('.new-bread-div > a,.bread-active-paren > a').siblings('ul').removeClass('bread-clicked');      
  });
  
});
*/


//$j(document).ready(function(){
/* Don't Remove - Place on first line of document ready */
//  $j('.new-second-level-navigation-outer').css('overflow','hidden');
// $j('.new-second-level-navigation-outer > div').css('visibility','hidden');
/* Don't Remove - Place on first line of document ready */

//});

/*$j(document).ready(function(){
 
  
  
  if($j('#MainWrapper').not('.lazyload')){
    
    setTimeout(function(){
      
      //console.log('no lazyload');
      
      $j('.new-second-level-navigation ul li.selected').parent().parent().addClass('new-bread-selected-item');
      $j('.new-bread-selected-item ul li.selected').addClass('new-bread-show');
      $j('.new-bread-selected-item ul li.current').siblings().addClass('siblings-show');
      $j('.new-bread-selected-item ul li.current').addClass('new-siblings-show');
      
      var newCurrentSiblings;
      if($j('body.ip3-level1 .used-for-clone li').hasClass('current haschildren')){
        newCurrentSiblings = $j('.used-for-clone li.current.haschildren > ul > li.level2').siblings();
        //console.log('navu');
        //console.log(newCurrentSiblings);
        $j('.new-bread-div-active ul').append(newCurrentSiblings);
      }
      
      if($j('body.ip3-level2 .used-for-clone > ul > li').hasClass('current haschildren')){
        newCurrentSiblings = $j('.used-for-clone li.current.haschildren > ul > li.level3').siblings();
        $j('.new-bread-div-active ul').append(newCurrentSiblings);
        
        $j('.used-for-clone li.current.haschildren > ul > li.level3').siblings().remove();
      }
      
      
      if($j('body.ip3-level3 .used-for-clone li').hasClass('selected haschildren')){
        newCurrentSiblings = $j('.used-for-clone li.selected.haschildren > ul > li.current.haschildren.level3 ul li.level4').siblings();
        $j('.new-bread-div-active ul').append(newCurrentSiblings);
        
        $j('.used-for-clone li.selected.haschildren > ul > li.current.haschildren.level3 ul li.level4').siblings().remove();
      }
      
      if($j('body.ip3-level4 .used-for-clone li').hasClass('selected haschildren')){
        newCurrentSiblings = $j('.used-for-clone .new-bread-show .new-bread-show .new-bread-show .new-siblings-show .level5').siblings();
        $j('.new-bread-div-active ul').append(newCurrentSiblings);
        
        $j('.used-for-clone .new-bread-show .new-bread-show .new-bread-show .new-siblings-show .level5').siblings().remove();
      }
      
      if($j('body.ip3-level5 .used-for-clone li').hasClass('selected haschildren')){
        newCurrentSiblings = $j('.used-for-clone .new-bread-show .new-bread-show .new-bread-show .new-bread-show .siblings-show.level5').siblings();
        $j('.new-bread-div-active ul').append(newCurrentSiblings);
        
        // Added for Year Item 
      //  $j('.used-for-clone .new-bread-show .new-bread-show .new-bread-show .new-siblings-show .new-siblings-show .level6').siblings().remove();
        // Added for Year Item 
    // 
    }
      */

/* 
 if($j('body').hasClass('ip3-level2')){
   if($j('.used-for-clone > ul > li.selected.haschildren > ul > li.current').hasClass('haschildren')){
     $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.bread-uppercase');      
     newCurrentSiblings = $j('.used-for-clone > ul > li > ul > li.current.haschildren > ul').html();
     $j('.new-bread-div-active-inner > ul').append(newCurrentSiblings);  
   }
   else{
     newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.level2').siblings();
     $j('.new-bread-div-active ul').append(newCurrentSiblings);
     $j('.bread-uppercase').hide();
     $j('.new-bread-div-active-inner ul li.level2 > span').show();
   }    
 }
 
 if($j('body').hasClass('ip3-level3')){
   
   if($j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.current').hasClass('haschildren')){
     $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
     $j('.used-for-clone > ul > li.selected > ul > li.selected > ul').clone().appendTo('.bread-uppercase');
     
     newCurrentSiblings = $j('.used-for-clone > ul > li > ul > li > ul > li.current.haschildren > ul').html();
     $j('.new-bread-div-active-inner > ul').append(newCurrentSiblings);          
   }
   else{
     $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
     //newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level3').siblings();          
     if($j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level3').siblings().length === 0){
     newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul').html();          
     }else{
     newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level3').siblings();
     }
     $j('.new-bread-div-active ul').append(newCurrentSiblings);
     $j('.bread-uppercase').hide();          
     $j('.new-bread-div-active-inner ul li.level3 > span').show();
     
   }  
 }
 if($j('body').hasClass('ip3-level4')){    
   if($j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.current').hasClass('haschildren')){
     $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
     $j('.used-for-clone > ul > li.selected > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(3)');
     $j('.used-for-clone > ul > li.selected > ul > li.selected > ul > li.selected > ul').clone().appendTo('.bread-uppercase'); 
   }
   else{
     
     //newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level4').siblings();
     
     	$j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
     	$j('.used-for-clone > ul > li.selected > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(3)');
     	$j('.used-for-clone > ul > li.selected > ul > li.selected > ul > li.selected > ul').clone().appendTo('.bread-uppercase');          
     
     	if($j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level4').siblings().length === 0){
     newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul').html();
     }else{
     newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level4').siblings();
     }
               
     //if($j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul')[0]){}
   //  else{
     //	$j('.bread-uppercase').addClass('selected');
    // }
     	$j('.new-bread-div-active ul').append(newCurrentSiblings);
     	$j('.bread-uppercase').hide();
     	$j('.new-bread-div-active-inner ul li.level4 > span').show();
     
     
     
   }    
 }
 */
/*if($j('body').hasClass('ip3-level5')){
  $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
  $j('.used-for-clone > ul > li.selected > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(3)');
  $j('.used-for-clone > ul > li.selected > ul > li.selected > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(4)');
}*/

/* Added for Year Item */
/*
if ($j('body').hasClass('ip3-level5')) {
  if ($j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.current').hasClass('haschildren')) {
    $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
    $j('.used-for-clone > ul > li.selected > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(3)');
    $j('.used-for-clone > ul > li.selected > ul > li.selected > ul > li.selected > ul').clone().appendTo('.bread-uppercase');
  } 
  else {
    $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
    $j('.used-for-clone > ul > li.selected > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(3)');
    $j('.used-for-clone > ul > li.selected > ul > li.selected > ul > li.selected > ul').clone().appendTo('.bread-uppercase');
    //newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level5').siblings();
    
    if($j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level4').siblings().length === 0){
    newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul').html();
    }else{
    newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level4').siblings();
    }          
    $j('.new-bread-div-active ul').append(newCurrentSiblings);
    $j('.bread-uppercase').hide();
    //$j('.new-bread-div-active-inner ul li.level5 > span').show();
    $j('.new-bread-div-active-inner ul li.level4 > span').show();
  }
}
*/
/* Added for Year Item */
/*
if ($j('body').hasClass('ip3-level6') && $j('.product-filter-area')[0]) {
      
    $j('.used-for-clone > ul > li.selected > ul > li.selected > ul > li.selected > ul').clone().appendTo('.bread-uppercase');
    
    $j('.new-bread-div ul li.haschildren > a').each(function(){
    	if(!$j(this).find('.icon-chevron-right')[0]){
      	$j(this).append('<span class="icon-chevron-right"></span>');
      }
    });
    
    $j('.bread-uppercase').hide();
    
    
}
      
      
      
$j(document).on("click", ".new-bread-div > a", function(e) {        
  var thisClicked = $j(this);
  if($j(this).hasClass('bread-active')){
    $j(this).removeClass('bread-active');
    $j(this).parent().removeClass('bread-active-parent');
    $j(this).siblings('ul').slideUp('500', function() {        
      thisClicked.siblings('ul').css('overflow','');
      thisClicked.siblings('ul').removeClass('bread-clicked');        
    });      
  }else{
    e.preventDefault();
    $j('.bread-uppercase > ul').css('overflow','');
    $j('.bread-uppercase > a').removeClass('bread-active');
    $j('.bread-uppercase').removeClass('bread-active-parent');
    $j('.bread-uppercase > ul').removeClass('bread-clicked');      
    $j('.bread-uppercase > ul').slideUp('500', function() {        
    });
    
    // Added Last 
    $j('.new-bread-div > ul').css('overflow','');
    $j('.new-bread-div > a').removeClass('bread-active');
    $j('.new-bread-div').removeClass('bread-active-parent');
    $j('.new-bread-div > ul').removeClass('bread-clicked');      
    $j('.new-bread-div > ul').slideUp('500', function() {        
      
    });
    // Added Last 
    thisClicked.parent().addClass('bread-active-parent');
    thisClicked.addClass('bread-active');
    $j(this).siblings('ul').slideDown('500', function() {
      
      thisClicked.siblings('ul').css('overflow','');
      thisClicked.siblings('ul').addClass('bread-clicked');
      
    });
    
  }
});
      
      
$j(document).on("click", ".bread-uppercase > a", function(e) {
  var thisClicked = $j(this);
  if($j(this).hasClass('bread-active')){
    $j(this).removeClass('bread-active');
    $j(this).parent().removeClass('bread-active-parent');
    $j(this).siblings('ul').slideUp('500', function() {        
      thisClicked.siblings('ul').css('overflow','');
      thisClicked.siblings('ul').removeClass('bread-clicked');        
    });      
  }else{
    e.preventDefault();
    $j('.new-bread-div > ul').css('overflow','');
    $j('.new-bread-div > a').removeClass('bread-active');
    $j('.new-bread-div').removeClass('bread-active-parent');
    $j('.new-bread-div > ul').removeClass('bread-clicked');      
    $j('.new-bread-div > ul').slideUp('500', function() {        
    });
    
    // Added Last 
    $j('.bread-uppercase > ul').css('overflow','');
    $j('.bread-uppercase > a').removeClass('bread-active');
    $j('.bread-uppercase').removeClass('bread-active-parent');
    $j('.bread-uppercase > ul').removeClass('bread-clicked');      
    $j('.bread-uppercase > ul').slideUp('500', function() {        
      
    });
    // Added Last 
    
    thisClicked.parent().addClass('bread-active-parent');
    thisClicked.addClass('bread-active');
    $j(this).siblings('ul').slideDown('500', function() {
      
      thisClicked.siblings('ul').css('overflow','');
      thisClicked.siblings('ul').addClass('bread-clicked');
      
    });
    
  }
});
*/

//$j('body.ip3-level5 .bread-uppercase').remove();

/* Menu with more items Functionality Start */
/*  
    Breadcrumb();
      //rearrangeObjects();
      //rearrangeObjects();
      // Added for Year Item 
      if ($j('.menuParentFlag').length > 0) {
        if($j('body').hasClass('ip3-level6'))
        {
          newCurrentSiblings1 = $j('.used-for-clone ul > li.level4.selected > ul > li.level5').siblings();
          $j('.new-bread-div-active ul').append(newCurrentSiblings1);
          
        }
        else if($j('body').hasClass('ip3-level5'))
        {
          newCurrentSiblings1 = $j('.used-for-clone ul > li.level3.selected > ul > li.level4').siblings();
          $j('.new-bread-div-active ul').append(newCurrentSiblings1);
          
        }
          else if($j('body').hasClass('ip3-level4'))
          {
            newCurrentSiblings1 = $j('.used-for-clone ul > li.level2.selected > ul > li.level3').siblings();
            //console.log(newCurrentSiblings1);
            $j('.new-bread-div-active ul').append(newCurrentSiblings1);
            
          }
            else if($j('body').hasClass('ip3-level3'))
            {
              newCurrentSiblings1 = $j('.used-for-clone ul > li.level1.selected > ul > li.level2').siblings();
              $j('.new-bread-div-active ul').append(newCurrentSiblings1);
              Breadcrumb();
              
            }
              else if($j('body').hasClass('ip3-level2'))
              {
                newCurrentSiblings1 = $j('.newbread-last ul > li.selected > ul > li.level1').siblings();
                $j('.new-bread-div-active ul').append(newCurrentSiblings1);
                
              }
      }else if($j('body').hasClass('ip3-level4') && $j('.product-finder-dynamic-content').length>0)
      {
        $j('.newbread-last').hide();
        newCurrentSiblings1 = $j('.used-for-clone ul > li.level2.selected > ul > li.level3').siblings();
        //console.log(newCurrentSiblings1);
        $j('.new-bread-div-active ul').append(newCurrentSiblings1);
        
      }
        else if($j('body').hasClass('ip3-level5') && $j('.product-finder-dynamic-content').length>0)
        {
          $j('.new-bread-div:nth-child(4)').hide();
        }
          else if($j('body').hasClass('ip3-level6') && $j('.prod-finder-contentwrapper').length>0)
          {
            $j('.new-bread-div:nth-child(4),.new-bread-div:nth-child(5),.new-bread-div:nth-child(6),.new-bread-div-active-inner .bread-uppercase').hide();
            newCurrentSiblings1 = $j('.used-for-clone ul > li.level2.selected > ul > li.level3').siblings();
            //console.log(newCurrentSiblings1);
            $j('.new-bread-div-active ul').append(newCurrentSiblings1);
          }
      
      
    },2000);
    
    
    // Double Tap To Go 
    $j('.new-second-level-navigation .new-bread-div ul li.haschildren,.new-second-level-navigation li.bread-uppercase ul li').doubleTapToGo();
    $j('.new-second-level-navigation .new-bread-div ul li.haschildren,.new-second-level-navigation li.bread-uppercase ul li').each(function() {
      $j(this).attr('aria-haspopup', 'true');
      $j(this).children("a").attr('onclick', 'true');
    });
    
    // Don't Remove - Place on last line of window load 
    setTimeout(function(){
      $j('.new-second-level-navigation-outer').css('overflow','visible');
      $j('.new-second-level-navigation-outer').css('height','auto');
      rearrangeObjects();
      $j(window).trigger('resize');
      
    },5000);
    setTimeout(function(){
      $j('.new-second-level-navigation-outer > div').css('visibility','visible');
      rearrangeObjects();
      $j(window).trigger('resize');
    },5000);
    // Don't Remove - Place on last line of window load 
  }
});


$j(window).load(function(){
  if($j('.product-finder-dynamic-content').length>0 || $j('.prod-finder-contentwrapper').length>0)
  {
    setTimeout(function(){
      rearrangeObjects();
      $j(window).trigger('resize');
    },100);
    setTimeout(function(){
      rearrangeObjects();
      $j(window).trigger('resize');
    },200);
  }
  
  if($j('body').hasClass('ip3-innovation'))
  {  
    for(var i = 0; i < item_count; i++) {
      setTimeout(function(){
        rearrangeObjects();
      },2000);
      
    }
    
  }
  // Added on 11-12-2017        
  $j('.new-second-level-navigation .new-bread-div li.haschildren > a,.new-second-level-navigation .new-bread-div li.haschildren.current > span').each(function () {
    $j(this).append('<span class="icon-chevron-right"></span>');
  });
  $j('.new-second-level-navigation li.bread-uppercase ul li.haschildren > a,.new-second-level-navigation li.bread-uppercase ul li.haschildren.current > span').each(function () {
    $j(this).append('<span class="icon-chevron-right"></span>');
  });
  // Added on 11-12-2017 
});
*/

/*
function Breadcrumb()
{
    
      // Menu with more items Functionality Start 
      
      togetwidth = $j('.togetwidth').outerWidth();
      firstDivwidth = $j('.togetwidth .col-xs-12 .new-bread-div:eq(2)').outerWidth();
      secondDivwidth = $j('.togetwidth .col-xs-12 .new-bread-div:eq(3)').outerWidth();
      thirdtDivwidth = $j('.togetwidth .col-xs-12 .new-bread-div:eq(4)').outerWidth();
      moreDivwidth = $j('.secondlevelmore').outerWidth();
      
      finalavalWidth = togetwidth - (firstDivwidth + secondDivwidth + thirdtDivwidth + moreDivwidth+170);
      
      */
/*console.log(togetwidth);
   console.log(firstDivwidth);
   console.log(secondDivwidth);
   console.log(thirdtDivwidth);
   console.log(moreDivwidth);   
   console.log(finalavalWidth);*/

/*
item_count = $j('.new-bread-div-active-inner > ul > li[id^="new-secondnav-nav"]').length;
//  console.log(item_count);
nav_width = $j('.view-more-nav-container').outerWidth();  
      
      
item_width = firstDivwidth + secondDivwidth + thirdtDivwidth;
$j('.new-bread-div-active-inner > ul > li[id^="new-secondnav-nav"]').each(function() {
  var $this = $j(this);
  item_width += $this.outerWidth();
});  
      
if(item_width > nav_width ){
  $j('.new-bread-div-active-inner').append("<div class='secondlevelmore'><a href='javascript:;' id='more'>More</a></div><div class='secondlevelnextall'></div>");
  $j('#more').appendTo('.new-bread-div-active-inner .secondlevelmore');
  $j('.secondlevelmore').hide();
}
      
      
for(var i = 0; i < item_count; i++) {
  setTimeout(function(){
    item_width = firstDivwidth + secondDivwidth + thirdtDivwidth;
    //console.log(item_width + 'after append');
    $j('.new-bread-div-active-inner > ul > li[id^="new-secondnav-nav"]').each(function() {
      var $this = $j(this);
      item_width += $this.outerWidth();
      
      
      if (nav_width < item_width){
        $this.appendTo($j('.secondlevelnextall'));
        $j('#more').appendTo('.new-bread-div-active-inner .secondlevelmore');
        $j('.secondlevelmore').show();          
      }
      
      
    });
    checkWidth = $j('.new-bread-div-active-inner > ul').outerWidth()+50;
    */
/*console.log(checkWidth + 'n: check');
      console.log(finalavalWidth + 'n: final');*/
/*
          if(finalavalWidth < checkWidth){
            //console.log('test0'+ $j('.secondlevelmore').length);
            if($j('.secondlevelmore').length <= 0 )
            {
              //console.log('test'+ $j('.secondlevelmore').length);
              $j('.new-bread-div-active-inner').append("<div class='secondlevelmore'><a href='javascript:;' id='more'>More</a></div><div class='secondlevelnextall'></div>");
              $j('#more').appendTo('.new-bread-div-active-inner .secondlevelmore');
              $j('.secondlevelmore').hide();
            }
            $j('.new-bread-div-active-inner > ul > li[id^="new-secondnav-nav"]').not('#more').last().prependTo($j('.secondlevelnextall'));
            // $this.prependTo($j('.secondlevelnextall'));
            $j('#more').appendTo('.new-bread-div-active-inner .secondlevelmore');
            $j('.secondlevelmore').show();
            
                      
          }
        
          if($j('.secondlevelnextall li > span').length > 0)
          {
          $j('.secondlevelmore').addClass('hasActiveEle');
         
          }
          else{
           if($j('.secondlevelnextall li').hasClass("selected")){
            $j('.secondlevelmore').addClass('hasActiveEle');
          } else{
            $j('.secondlevelmore').removeClass('hasActiveEle');
          }
          }
          
          if($j('.secondlevelnextall li').length === 0){
            $j('.secondlevelmore').hide();
          }        
        },2000);
        setTimeout(function(){
          rearrangeObjects();
        },2000);
        
      }
      
      
      $j('.new-second-level-navigation .new-bread-div li.haschildren > a,.new-second-level-navigation .new-bread-div li.haschildren.current > span').each(function () {
        $j(this).append('<span class="icon-chevron-right"></span>');
      });
      
      
      $j('.new-bread-div ul li.haschildren').hover(function () {
        if ($j(this).find('ul').length > 0) {
          //console.log($j(this).parent('ul').height());
          $j(this).find('ul').css('min-height', $j(this).parent('ul').height());
        }
      });
      
      
      $j('.new-second-level-navigation li.bread-uppercase ul li.haschildren > a,.new-second-level-navigation li.bread-uppercase ul li.haschildren.current > span').each(function () {
        $j(this).append('<span class="icon-chevron-right"></span>');
      });
      
      $j('.new-second-level-navigation li.bread-uppercase ul li.haschildren').hover(function () {
        if ($j(this).find('ul').length > 0) {
          //console.log($j(this).parent('ul').height());
          $j(this).find('ul').css('min-height', $j(this).parent('ul').height());
        }
      });
      
      
      $j('.new-bread-div-active-inner > ul > li[id^="new-secondnav-nav"] > ul').remove();
      $j('.new-bread-div').last().addClass('newbread-last');
      
      
      // Added for Year Item 
      
      if ($j('.new-bread-div-active-inner ul li').length === 0) {
        $j('.new-bread-div.newbread-last').css('display','none');
        $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
        newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level3').siblings();
        $j('.new-bread-div-active ul').append(newCurrentSiblings);        
      }
      else if($j('.new-bread-div-active-inner ul li').length === 1 && !$j('.new-bread-div-active-inner ul li').is(':visible')){
      	$j('.new-bread-div.newbread-last').css('display','none');
        $j('.used-for-clone > ul > li.selected > ul').clone().appendTo('.new-bread-div:eq(2)');
        newCurrentSiblings = $j('.used-for-clone > ul > li.selected.haschildren > ul > li.selected.haschildren > ul > li.level3').siblings();
        $j('.new-bread-div-active ul').append(newCurrentSiblings);  
      }


}

*/