/*
    Objective: Auto complete the text boxes for the user form
    Input: Text from the user form
    Output: The result iff match is found
    Assumptions: none at this time

    Created: 02/18/2016
 */


$(function() {
    $("#icd10search").autocomplete({
        source : function(request, response) {
            $.ajax({
                url : "/Medprice/controller/ICD10SearchHandler.php",
                type : "GET",
                data : {
                    term : request.term
                },
                dataType : "json",
                success : function(data) {
                    response(data);
                }
            });
        }
    });
});

//This code looks for the diagnosis description
$(function() {
    $("#diagnosisDesc").autocomplete({
        source : function(request, response) {
            $.ajax({
                url : "/Medprice/controller/DescriptionSearchHandler.php",
                type : "GET",
                data : {
                    term : request.term
                },
                dataType : "json",
                success : function(data) {
                    response(data);
                }
            });
        }
    });
});
$(function() {
    $("#facilitySearch").autocomplete({
        source : function(request, response) {
            $.ajax({
                url : "/Medprice/controller/FacilitiesSearchHandler.php",
                type : "GET",
                data : {
                    term : request.term
                },
                dataType : "json",
                success : function(data) {
                    response(data);
                }
            });
        }
    });
});
$(function() {
    $("#userZip").autocomplete({
        source : function(request, response) {
            $.ajax({
                url : "/Medprice/controller/ZipcodeHandler.php",
                type : "GET",
                data : {
                    term : request.term
                },
                dataType : "json",
                success : function(data) {
                    response(data);
                }
            });
        }
    });
});
