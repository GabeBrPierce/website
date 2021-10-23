<?php 
$active_index = 0;
include("includes/header.php");
?>
        <div class="jumbotron jumbotron-fluid bg-dark jumbotron-size">
            <div class="container">
                <h1 class="gabe-is">Gabriel is
                    <span class="txt-rotate" data-period="2000" data-rotate='[ "a developer.", "a quick learner.", "a team-player.", "talented.", "a father.", "a husband.", "a christian." ]'></span>
                </h1>
            </div>
        </div>
        <div class="container">
            <h2 class="mono-heading">I'm a developer!</h2>
            <p class="lead">This past year has been crazy! I enrolled and completed the <a href="https://www.otech.edu/">Ogden-Weber Technical College's</a> Software Technology, and Software Developer programs.
                So, I can proudly say that I am a developer! But even though being certified is all new to me, software definitely isn't. For the past two years I have been creating business intelligence solutions
                for AmeriCorps. And I have been designing software for video games ever since I was 16! I you would like me to do some consulting for your business. Click here to visit my form.

            </p>
            <h2 class="mono-heading">I'm a quick learner!</h2>
            <p class="lead">
                A skill that most people look for in a software developer is the ability to learn. Software's sands are ever shifting. And it takes
                people who know how to absorb knowledge to stay on top of it all. It is a good thing that I recorded my progress in my programs at the Ogden-Weber Technical College!
                Now you have data to see how quick of a learner I am, and how motivated I am to get projects finished!
            </p>
            <iframe width="100%" height="800px" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRdVfkQ4qHlTauPhj7ugrnsDJWF-GeP-0BWXKk1mBvAjMLbtdBO5iiUCzoLWx1dNCuWOdhgbsPxoW4-/pubhtml?widget=true&amp;headers=false"></iframe>
        </div>
        <script>/*this I got from the internet*/
/*https://speckyboy.com/css-javascript-text-animation-snippets/*/
var TxtRotate = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 300 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(css);
};
/**/</script>
<?php include("includes/footer.php") ?>
    