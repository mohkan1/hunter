$(document).ready(function(){
  //Hiding the elements
  $('img').hide();
  $('main').hide();
  $('aside').hide();
  $('article').hide();
  //showing the menu
  $('.dropdown').show();
  //showing the map
  $('.map').show();
  //showing the top button
  $('#top').show();
  //moving smoothly
  $("#menu").click(function() {
      $('html,body').animate({
        scrollTop:$(".element1").offset().top}, 2000);
      });
  //moving smoothly
  $("#who").click(function() {
    $('html,body').animate({
      scrollTop:$(".element2").offset().top}, 2000);
      });
  //moving smoothly
  $("#contact").click(function() {
      $('html,body').animate({
        scrollTop:$(".container").offset().top}, 2000);
      });
  //moving smoothly
  $("#top").click(function() {
      $('html,body').animate({
        scrollTop:$("#getup").offset().top}, 2000);
      });
  //moving ot the map
  $("#map").click(function() {
      $('html,body').animate({
        scrollTop:$(".map").offset().top}, 2000);
      });
  //moving to home
  $("#home").click(function() {
      $('html,body').animate({
        scrollTop:$(".parallax").offset().top}, 2000);
      });
  //The function that ckecks if the input is allowed or not
  function testInfo(input,re,textsvar){ //taking tre parameters (the input, regular expression and where to print the answer)

    var OK = re.exec(input);
    if (!OK)
          $(textsvar).text("fel");
    else
    $(textsvar).text("ok");

    }
  //when the key is up check what he/she wrote is allowed
  $("#number").keyup(function(){

    var re = /^[0]{1}[0-9]{6,15}$/;
    testInfo($('#number').val(),re,".answerN");

  });

  //when the key is up check what he/she wrote is allowed
  $("#fname").keyup(function(){

    var re = /^[A-Za-z]+$/;
    testInfo($('#fname').val(),re,".answerF");

  });
  //when the key is up check what he/she wrote is allowed
  $("#lname").keyup(function(){

    var re = /^[A-Za-z]+$/;
    testInfo($('#lname').val(),re,".answerL");

  });
  //when the key is up check what he/she wrote is allowed
  $("#gmail").keyup(function(){

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    testInfo($('#gmail').val(),re,".answerG");

  });


  //writint the title of the website slowly (a time has been used to do such thing)
    var i = 0;
    var txt = 'Welcome to Hungry';
    var speed = 100;

    function typeWriter() {
      if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);

      }
    }
    typeWriter();

    //writint the title of the website slowly (a time has been used to do such thing)

});
