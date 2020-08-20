$(function(){

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',  //  prevYear nextYea
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },  
        buttonIcons:{
            prev: 'left-single-arrow',
            next: 'right-single-arrow',
            prevYear: 'left-double-arrow',
            nextYear: 'right-double-arrow'         
        },   
        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.car_numbers);
            $("#fullCalModal").modal('show');
            } ,
//        theme:false,
//        themeButtonIcons:{
//            prev: 'circle-triangle-w',
//            next: 'circle-triangle-e',
//            prevYear: 'seek-prev',
//            nextYear: 'seek-next'            
//        },
//        firstDay:1,
//        isRTL:false,
//        weekends:true,
//        weekNumbers:false,
//        weekNumberCalculation:'local',
//        height:'auto',
//        fixedWeekCount:false,
        events: {
            url: 'data_events-3.6.2.php?gData=1',
            error: function() {

            }
        },    
        eventLimit:true,
//        hiddenDays: [ 2, 4 ],
        lang: 'th',
//         dayClick: function() {
// //            alert('a day has been clicked!');
// //            var view = $('#calendar').fullCalendar('getView');
// //            alert("The view's title is " + view.title);
//         } , 


        eventMouseover: function( event, jsEvent, view ){
            callTooltip("#infotooltip",jsEvent,event.title);   
        },
        eventMouseout: function( event, jsEvent, view ){
            $("#infotooltip").hide();  
        }
       
    });

    var callTooltip = function (obj,jsEvent,strText){ // ฟังก์ชั่นแสดงกล่องข้อความ Tooltip  
        var locateX=jsEvent.pageX;     
        var locateY=jsEvent.pageY;   
        locateX+=10;  
        locateY+=10;  
        $(obj).show().css({  
            left:locateX,  
            top:locateY  
        }).html(strText);                 
    }    
    
});