$(function() {
    console.log("ready!");
    
    $(".clipboard-button").click(function(e) {
        e.preventDefault();
        var mystring = $(this).prop('id');
        console.log(mystring);
        navigator.clipboard.writeText(mystring).then(function() {
            /* clipboard successfully set */
        }, function() {
            /* clipboard write failed */
        });
        $(".clipboard-button").html('<i class="bi bi-clipboard"></i>');
        $(this).html('<i class="bi bi-clipboard-check"></i>');
    });
    // anything with the auto card class name will be converted into a card.
    $(".auto_card").each(function(k, v){
        card = this
        url = $(this).attr("data-url");
        $.post($(this).attr("data-url"), 
            function (data, textStatus, jqXHR) {
                
                myobj = JSON.parse(data);
                
                tagString = "";
                myobj.tags.forEach(element => {
                    lowerColor = element[1];
                    lowerColor = lowerColor.toLowerCase();
                    
                    lowerInput = element[0];
                    lowerInput = lowerInput.toLowerCase();

                   
                    switch (lowerColor) {
                        case "primary":
                        case "blue":
                        tagString += '<span class="badge rounded-pill bg-primary text-light">'+lowerInput+'</span>'
                            break;
                        case "secondary":
                        case "grey":
                        case "gray":
                            tagString += '<span class="badge rounded-pill bg-secondary text-light">'+lowerInput+'</span>'
                            break;
                        case "success":
                        case "green":
                            tagString += '<span class="badge rounded-pill bg-success text-light">'+lowerInput+'</span>'
                            break;
                        case "danger":
                        case "red":
                            tagString += '<span class="badge rounded-pill bg-danger text-light">'+lowerInput+'</span>'
                            break;
                        case "warning":
                        case "orange":
                        case "yellow":
                            tagString += '<span class="badge rounded-pill bg-warning text-dark">'+lowerInput+'</span>'
                            break;
                        case "info":
                        case "cyan":
                            tagString += '<span class="badge rounded-pill bg-info text-dark">'+lowerInput+'</span>'
                            break;
                        case "light":
                        case "white":
                            tagString += ' <span class="badge rounded-pill bg-light text-dark">'+lowerInput+'</span>'
                            break;
                        case "dark":
                        case "black":
                            tagString += '<span class="badge rounded-pill bg-dark text-light">'+lowerInput+'</span>'
                            break;
                        default:
                            tagString += '<span class="badge rounded-pill bg-light text-light">'+lowerInput+'</span>'
                            break;
                    }
                });
                text = ["<div class='card'><div class='card-header mono-heading'><i>",myobj.created,"</i></div><div class='card-body blog-card-body' ><h5 class='card-title mono-heading'>",myobj.title,"</h5><div class='row'><div class='col-md-9'><p class='card-text lead'>",myobj.teaser,"</p></div><div class='col-3 d-none d-md-block '><img src='",myobj.img,"' alt='test img' width='auto' height='100px'></div></div><a href='"+url+"' class='btn btn-primary mt-2'>Read More</a></div><div class='card-footer text-muted'><div class='row'><div class='col-sm-8'>",tagString,"</div><div class='col-2 d-none d-sm-block'>",myobj.series,"</div><div class='col-sm-2'>",myobj.author,"</div></div></div>"].join('');
                console.log(text);
                $(card).replaceWith(text);

            }
        );
            
    });
});