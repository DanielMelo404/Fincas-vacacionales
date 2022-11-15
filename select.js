
/* ---------------------------------------- Dropdown menus INTEGRATION WITH SELECT ELEMENTS------------------------------------------- */

function select(){
      var i;
      var customSelects = document.getElementsByClassName('customSelect');//

      for(i=0; i<customSelects.length; i++){
        /*
        class: optionSelected to selectedOption
              cstmSelDivs to customSelects
              same-selected to sameSelected
        */


          var select = customSelects[i].getElementsByTagName('select')[0];//we select the SELECT element inside each customSelect div
          var selectedOption = document.createElement('div');//creation of the selected option div
          selectedOption.setAttribute('class','selectedOption');
          selectedOption.innerHTML = select.options[select.selectedIndex].innerHTML;
          customSelects[i].appendChild(selectedOption);//selectedOption now is now the second child of customSelect

        //creation of the div that contains all options

          var optionContainer = document.createElement('div');
          optionContainer.setAttribute('class', 'optionsContainer ' + 'cont'+ i + ' hide');
          optionContainer.setAttribute('id','cont'+ i);
          customSelects[i].appendChild(optionContainer);//the container is now the third child of customSelect

        //creation of divs replacing the options items
          for(w = 0; w< select.length ; w++){

            var optionDiv = document.createElement('div');
            optionDiv.innerHTML = select.options[w].innerHTML;
            optionDiv.setAttribute('class','option');
            optionDiv.addEventListener('click',function(e){//this event is for changing the content on the selected option div
                    var thisSelect = this.parentElement.parentElement.getElementsByTagName('select')[0];//we select the correspondig select of its customSelect
                    var thisSelectedOption = this.parentElement.previousSibling;//same as before we select the corresponding selectedOption
                    var thisOptionsContainer = this.parentElement;//same.....
                    var thisText = this.innerHTML;//text content of the optionDiv

                  for(var e=0;e<thisSelect.length;e++){//with these loop we look for the ci

                    //change of the content on the selected option div

                    if(thisSelect.options[e].innerHTML == thisText){//for finding the correct SELECT option and selecting it
                      thisSelect.selectedIndex = e;
                      thisSelectedOption.innerHTML = thisText;
                      var sameSelected = thisOptionsContainer.getElementsByClassName('sameSelected').length;
                      var thisOptions = thisOptionsContainer.getElementsByClassName('option');
                      //console.log(sameSelected);
                      for(var t=0; t<thisOptions.length; t++){
                        thisOptions[t].setAttribute('class','option');
                      }
                      this.setAttribute('class','option sameSelected');//for changing to blue the selected option from the container
                      break;
                    }

                  }
                  thisSelectedOption.click();

                });
                optionContainer.appendChild(optionDiv);

            }

            /* ----------------------------------------- visual efects for hiding and showing dropdowns ------------------------------------------------*/
            selectedOption.addEventListener('click',function(w){
              w.stopPropagation();//for only doing click on the selected option (like only clicking once)
              closeAll(this);//for colsing everything else
              this.nextSibling.classList.toggle('hide');//for hiding or showing the option container
              this.nextSibling.classList.toggle('show');
              //this.parentElement.parentElement.classList.remove('neutralPhone');
              //this.parentElement.parentElement.classList.add('shownPhone');//this is now shownPhone class
              this.classList.toggle("arrowActive");//changing the arrow status
              });

        }
/*------------------------------------- for closing all selects when any of document part is clicked -----------------------------------------*/

        function closeAll(elmnt){
        var optionContainers = document.getElementsByClassName('optionsContainer');
        var selectedOptions = document.getElementsByClassName('selectedOption');
        var a = 0;

        for(var i=0; i<optionContainers.length; i++){//change of classes for hiding and showing

          if((selectedOptions[i].classList == 'selectedOption arrowActive')&&(a == 0)){
            i=0;
            a=1;
          }
          console.log(a);

          if(a==1){
            optionContainers[i].parentElement.parentElement.classList.remove('shownPhone');
            optionContainers[i].parentElement.parentElement.classList.remove('hiddenPhone');
            optionContainers[i].parentElement.parentElement.classList.add('neutralPhone');
          }
          console.log(elmnt);

          if((elmnt != selectedOptions[i])&&(elmnt!= undefined)){
            selectedOptions[i].classList.remove('arrowActive');
            optionContainers[i].classList.remove('show');
            optionContainers[i].classList.add('hide');
            if(a == 0){
              optionContainers[i].parentElement.parentElement.classList.remove('shownPhone');
              optionContainers[i].parentElement.parentElement.classList.remove('neutralPhone');
              optionContainers[i].parentElement.parentElement.classList.add('hiddenPhone');
            }
          }else{
            if((a==0)&&(elmnt!= undefined)){
              optionContainers[i].parentElement.parentElement.classList.remove('neutralPhone');
              optionContainers[i].parentElement.parentElement.classList.add('shownPhone');
            }
          }
        }
      }
      document.addEventListener('click',function(){closeAll()});
}

select();

function deletee(){//for deleting every child of the municipalitys container as it changes depending on the department select
  var selectMunOptionContainer = document.getElementById('cont1');
  var num = selectMunOptionContainer.childNodes.length;
  if(num>1){
    for(i=1; i<num; i=i+1){
      selectMunOptionContainer.children[0].nextSibling.remove();
    }
  }
}


function update(){// for updating with the new options the option container of the municipalitys
      var selectMun = document.getElementsByTagName('select')[1];
      var selectMunOptionContainer = document.getElementById('cont1');
      var selectedOptionMun = document.getElementsByClassName('selectedOption')[1];
      selectedOptionMun.innerHTML = 'Municipio';

      for(i=0; i<selectMun.length; i++){
        optionDiv = document.createElement('div');
        optionDiv.innerHTML = selectMun.options[i].innerHTML;
        optionDiv.setAttribute('class','option');
        optionDiv.addEventListener('click',function(e){//for creating new
                var thisSelect = this.parentElement.parentElement.getElementsByTagName('select')[0];
                var thisSelectedOption = this.parentElement.previousSibling;
                var thisOptionContainer = this.parentElement;

              for(e=0;e<thisSelect.length;e++){
                //change of the content on the selected option div
                if(thisSelect.options[e].innerHTML == this.innerHTML){
                  thisSelect.selectedIndex = e;
                  thisSelectedOption.innerHTML = this.innerHTML;

                  for(t=0;t<thisOptionContainer.getElementsByTagName('div').length;t++){
                    thisOptionContainer.getElementsByTagName('div')[t].setAttribute('class','option');
                  }
                  this.setAttribute('class','option sameSelected');
                  break;
                }

              }
              thisSelectedOption.click();
            });
        selectMunOptionContainer.appendChild(optionDiv);
      }

}



var departmentOptions = document.getElementsByClassName('optionsContainer')[0].getElementsByClassName('option');

for(i=0; i<departmentOptions.length; i++){//for upadating info in municipality select as soon as clicked
  departmentOptions[i].addEventListener('click',function(){populate('id_departamento','municipio'); deletee(); update();});
}
