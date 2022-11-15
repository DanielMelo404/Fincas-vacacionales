const isNumericInput = function(event){
  const key = event.keyCode;
  return ((key >= 48 && key <= 57) || // Allow number line
  (key >= 96 && key <= 105) // Allow number pad
  );
};

const isModifierKey = function(event){
  const key = event.keyCode;
  return ((event.shiftKey === true || key === 35 || key === 36) || // Allow Shift, Home, End
  (key === 8 || key === 9 || key === 13 || key === 46) || // Allow Backspace, Tab, Enter, Delete
  (key > 36 && key < 41) || // Allow left, up, right, down
  (
    // Allow Ctrl/Command + A,C,V,X,Z
    (event.ctrlKey === true || event.metaKey === true) &&
    (key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
  ));
}

const enforceFormat = function(event){
  if(!isNumericInput(event) && !isModifierKey(event)){
  event.preventDefault();
  }
}

const formatToPhone = function(event){
  // I am lazy and don't like to type things more than once
  const target = event.target;
  const input = event.target.value.replace(/\D/g,'').substring(0,10);

}

const formatToArea = function(event){
  const target = event.target;
  const input = event.target.value.replace(/\D/g,'').substring(0,6);

  const firstThree = input.substring(0,3);
  const nextThree = input.substring(3,6);

  if(input.length>3){target.value = firstThree + "." + nextThree + 'm²';
    }else if(input.length>0){
      target.value = firstThree + 'm²';
    } else if(input.length==0){
      target.value = 'm²';
    }
}

const formatToPrecio = function(event){
  const target = event.target;
  const input = event.target.value.replace(/\D/g,'').substring(0,6);

  const firstThree = input.substring(0,3);
  const nextThree = input.substring(3,6);

  if(input.length>3){target.value = firstThree + "." + nextThree + '$';
    }else if(input.length>0){
      target.value = firstThree + '$';
    } else if(input.length==0){
      target.value = '$';
    }
}

const celular = document.getElementById('celular');
celular.addEventListener('keydown', enforceFormat);
celular.addEventListener('keyup',formatToPhone);

const area = document.getElementById("area");
area.addEventListener('keydown', enforceFormat);
area.addEventListener('keyup',formatToArea);

const habitaciones = document.getElementById('habitaciones');
habitaciones.addEventListener('keydown', enforceFormat);

const parqueaderos = document.getElementById('parqueaderos');
parqueaderos.addEventListener('keydown', enforceFormat);

const banios = document.getElementById('banios');
banios.addEventListener('keydown', enforceFormat);

const precio = document.getElementById("precio");
precio.addEventListener('keydown', enforceFormat);
precio.addEventListener('keyup',formatToPrecio);

const precioTemp = document.getElementById("precioTemp");
precioTemp.addEventListener('keydown', enforceFormat);
precioTemp.addEventListener('keyup',formatToPrecio);

const cupo = document.getElementById('cupo');
cupo.addEventListener('keydown', enforceFormat);

var images = document.getElementById('images');


images.addEventListener('change', function(){readFiles(this.files);});
function readFiles(files){
  function setUpReader(file,elmnt){
    var reader = new FileReader();

    reader.onload = function(e){
      elmnt.setAttribute('src',e.target.result);
    }
    reader.readAsDataURL(file)
  }
  for(i=1; i<=files.length ; i++){
    var img = document.getElementById('img'+i);
    setUpReader(files[i-1],img);

  }


}
