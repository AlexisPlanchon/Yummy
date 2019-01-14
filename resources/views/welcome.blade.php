@extends('layouts.app')

@section('content')

<div>
	<center> <div style="position:center"class="texte-bienvenue">
        <h3>Bienvenue sur Yummy !<br>
        Le site spécialisé en cuisine Japonaise</h3>
    </div></center>
<div class ="overlay">
    
    <div class="slider">

        <img class="mySlides" src="{{ asset('images/poulpe-caroussel.jpg') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/Takoyaki-caroussel.jpg') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/NuggetsWasabi_Carrou.png') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/daifuku-caroussel.jpg') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/gimbap-caroussel.jpg') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/Kampai-caroussel.jpg') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/Makis_saumon_Carrou.png') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/rocher-caroussel.jpg') }}" style="width:100%">
        <img class="mySlides" src="{{ asset('images/Sushi-caroussel.jpg') }}" style="width:100%">


          <button class="fleche btn-gauche" onclick="plusDivs(-1)">&#10094;</button>
          <button class="fleche btn-droit" onclick="plusDivs(1)">&#10095;</button>
    </div>

</div>
</div>








<script>

    var slideIndex = 1;
var x = document.getElementsByClassName("mySlides");

    showDivs(slideIndex);
  
function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
    
   setInterval("showDivs(slideIndex = (slideIndex+1)%x.length)", 4000);
</script>

@endsection
