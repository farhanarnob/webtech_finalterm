function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            submission_answer();
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 5 * 1,
        display = document.querySelector('#current_time');
    startTimer(fiveMinutes, display);
};
function submission_answer(){
	// document.getElementById("submission_answer_form").submit();
}