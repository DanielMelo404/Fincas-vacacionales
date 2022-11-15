/*------------------------ ANIMATION OF THE COVER PAGE -----------------------------*/

//Animation of the "Fincas para las vacaciones facil y rapido"

function sloganMove(){
  var slogan = document.getElementById('slogan');
  slogan.style.top = '40%';
  setTimeout(function(){
    slogan.style.top = '-90%';
  }, 200);
  setTimeout(function() {
    slogan.style.display="none";
  },700);
}
//Animation of the part of "Encuentra finca Publica"

function optionsMove(){
  var h2Encuentra = document.getElementById('h2Encuentra');
  var h2Publica = document.getElementById('h2Publica');
  var hr = document.getElementById('hr');
  var coverPage = document.getElementById('coverPage');
  var pPublica = document.getElementById('pPublica');
  var pEncuentra = document.getElementById('pEncuentra');

  coverPage.style.display = 'block';
  coverPage.style.left = "0px";
  setTimeout(function(){
  //  h2Encuentra.classList.add('rotateH2');
  //  h2Publica.classList.add('rotateH2');
   hr.classList.remove('invisible');
   hr.classList.add('visible');
  }, 400);
  setTimeout(function(){
    hr.classList.add('rotateHr');
  }, 1000)
  setTimeout(function(){
    h2Encuentra.classList.remove('hiddenEncuentra');
    h2Publica.classList.remove('hiddenPublica');
    h2Encuentra.classList.add('visibleEncuentra');
    h2Publica.classList.add('visiblePublica');
  }, 1500);
  setTimeout(function(){
    pEncuentra.classList.remove('invisible');
    pPublica.classList.remove('invisible');
    pEncuentra.classList.add('visible');
    pPublica.classList.add('visible');
  }, 2300);
}

setTimeout(sloganMove, 1000);
setTimeout(optionsMove,2800);
