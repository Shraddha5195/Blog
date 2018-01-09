{{-- FIRST EXAMPLE START --}}
<style type="text/css">
.overlay {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.5);
	opacity: 0;
	transition: .5s ease;
	z-index: -1;
}

.overlay.active {
	opacity: 1;
	z-index: 2;
}

.modal {
	color: white;
	max-height: calc(100% - 100px);
	position: fixed;
	top: 50%;
	left: 50%;
	max-width: 450px;
	transform: translate(-50%, -50%);
	background: blue;
	z-index: 3;
	visibility: hidden;
	opacity: 0;
	transition: .5s ease;
}
</style>

    <h1>Modal</h1>

<div class="overlay"></div>
<div class="modal">
    <h2>Modal</h2>
    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    <button class="close">Close</button></div>

<button class="open">Open</button>

                	

<script src="{{ url('js/jquery.js') }}"></script>
<script>
	
$(document).ready(function() {
	$(".open").on("click", function(){
	  $(".overlay, .modal").addClass("active");
	});

	$(".close, .overlay").on("click", function(){
	   $(".overlay, .modal").removeClass("active");
	});

	$(document).keyup(function(e) {
	  if (e.keyCode === 27) {
	    $(".overlay, .modal").removeClass("active");
	  }
	});
});

</script>
{{-- FIRST EXAMPLE END --}}

{{-- SECOND EXAMPLE START --}}
 <div id="fadeExp1">
    <img src="{{ url('/images/7.jpg') }}" width="100px" height="100px" />
    <img src="{{ url('/images/9.jpg') }}" width="100px" height="100px" />
    <img src="{{ url('/images/11.jpg') }}" width="100px" height="100px" />
</div>
                    
       

<script src="{{ url('js/jquery.js') }}"></script>
<script>
	
$(document).ready(function() {
  
    $("#fadeExp1 img").fadeTo(0, 0.6);

    $("#fadeExp1 img").hover(function () {
        $(this).fadeTo("slow", 1.0);
        },
        function () {$(this).fadeTo("slow", 0.3);
        }
    );	
});
</script>
{{-- SECOND EXAMPLE END --}}

{{-- THIRD EXAMPLE START --}}
<style type="text/css">
    #tab-data
{
    display: none;
}
        
#tab-data.selectedTab
{
    display: block;
    color: black;
    background: white;
    height: 400px;
    padding: 5px;
}
a {
  background: blue;
  border: 1px solid white;
}

a:hover {
  background: red;
  cursor: pointer; 
}
</style>
<div id="tabArea">
    <div id="tabHeader">
        <a id="tab1" class="tab selectTabHeader">Tab 1 </a>
        <a id="tab2" class="tab">Tab 2</a>
        <a id="tab3" class="tab">Tab 3 </a>
    </div>
    <div id="tabData">
        <div id="tab-data" class="tab1 selectedTab">
            tab 1 data
            <img src="{{ url('/images/7.jpg') }}" width="100px" height="100px" />
        </div>
        <div id="tab-data" class="tab2">
            tab 2 data
            <img src="{{ url('/images/9.jpg') }}" width="100px" height="100px" />
        </div>
        <div id="tab-data" class="tab3">
            tab 3 data
            <img src="{{ url('/images/11.jpg') }}" width="100px" height="100px" />
        </div>
    </div>
</div>

                    
       

<script src="{{ url('js/jquery.js') }}"></script>
<script>
$('.selectTabHeader').removeClass('selectTabHeader');
$(this).addClass('selectTabHeader');
var v = this.id;
$('.selectedTab').removeClass('selectedTab');


$('.' + v).addClass('selectedTab');

$(document).ready(function() {

 $('#tabHeader a').click(function () {

            // Set header
            $('.selectTabHeader').removeClass('selectTabHeader');
            $(this).addClass('selectTabHeader');

            // Show Actual area
            var v = this.id;

            $('.selectedTab').removeClass('selectedTab');

            $('.' + v).addClass('selectedTab');
    });

});



</script>
{{-- THIRD EXAMPLE END --}}
{{-- FOURTH EXAMPLE START --}}
<style type="text/css">
body{
  text-align: center;
}
</style>
<!DOCTYPE html>
<html>
<head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <meta charset="utf-8">
  <title>Scroll to the top of the page with jQuery</title>
</head>
<body>
  <p>hiiiiiiiiiiiii</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <p>jquery</p>
  <button id='top'>Go Top</button>  
</body>
</html>
<script src="{{ url('js/jquery.js') }}"></script>
<script>
  $('#top').click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });
  $(document).bind("contextmenu",function(e){
  return false;
    });
</script>

{{-- FOURTH EXAMPLE END --}}

