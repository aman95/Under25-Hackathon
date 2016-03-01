var ab;
$(document).ready(function(){

$(".button-collapse").sideNav();

$('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      /*ready: function() { alert('Ready'); }, // Callback for Modal open
      complete: function() { alert('Closed'); } // Callback for Modal close*/
    }
  );
    
    $('ul.tabs').tabs('select_tab', 'tab_id');
    $('select').material_select();
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

    /*$('input#input_text, textarea#textarea1').characterCounter();*/

    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    
ab=$('#getheight').height();

    


});
var rid=0,cid=0,temp=0;

var r_id;
var c_id;
var i=0,a,aa,appending,b;
 function display1(){
 	
	
 	if(i>3){
 		r_id="row"+""+rid;
 		console.log(r_id);
 		a='<div class="row" id=  '+r_id+'  ';
 		$("#papa").append(a+aa+appending+b+b);
 		aa='<div class="col s12 m4 l4" id= ' + c_id + ' >';
		appending= '<div class="card blue-grey darken-1"><div class="card-content white-text"> <span class="card-title">Card Title</span><p>I am a previous project. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p> </div> <div class="card-action"><a href="#">This is a link</a></div></div>';
		b='</div>';
 		i=0;
 		rid++;
 		cid++;

 	}
 	else{
 		c_id="col"+""+cid;
 		aa='<div class="col s12 m4 l4" id= ' + c_id + ' >';
		appending= '<div class="card blue-grey darken-1"><div class="card-content white-text"> <span class="card-title">Card Title</span><p>I am a previous project. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p> </div> <div class="card-action"><a href="#">This is a link</a></div></div>';
		b='</div>';


 		$("#firstrowapp").append(aa+appending+b);
 		cid++;
 		i++;
 	}
 };

 function getit(){
 	
    console.log(""+ab);
};

function myFunction(){

	$('#setheight').css("height",ab-20);

};







