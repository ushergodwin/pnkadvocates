new WOW().init();

function extractFilename(path) {
    if (path.substr(0, 12) === "C:\\fakepath\\")
        return path.substr(12); // modern browser
    var x;
    x = path.lastIndexOf('/');
    if (x >= 0) // Unix-based path
        return path.substr(x + 1);
    x = path.lastIndexOf('\\');
    if (x >= 0) // Windows-based path
        return path.substr(x + 1);
    return path; // just the filename
}
$(window).on('load', function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});
setInterval(() => {
    if (document.getElementById('time')) {
        let timeEl = document.getElementById('time');
        let time = new Date();
        let t = time.toLocaleTimeString();
        timeEl.innerHTML = t;
    }
}, 1000);
var landingPage = 'practice-area.php';

function ValidateEmail(mail) {
    let emailEl = document.getElementById('email');
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail)) {
        emailEl.style.border = "2px solid green";
        return (true)
    }
    emailEl.style.border = "2px solid red";
    emailEl.focus();
    return (false)
}

function ValidateName(name) {
    let nameEl = document.getElementById('name');
    if (/^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/.test(name)) {
        nameEl.style.border = "2px solid green";
        return (true)
    }
    nameEl.style.border = "2px solid red";
    nameEl.focus();
    return (false)
}

function ValidateMessage(message = "") {
    let messageEl = document.getElementById('message');
    let sendBtn = document.getElementById('send-btn');
    let len = message.length;
    let new_len = 100 - len;
    let feed = document.getElementById('max-words')
    if (new_len < 1) {
        feed.innerHTML = 0;
    } else {
        feed.innerHTML = new_len;
    }
    if (len < 100) {
        messageEl.style.border = "2px solid red";
        sendBtn.setAttribute('disabled', true);
    } else {
        sendBtn.removeAttribute('disabled');
        messageEl.style.border = "2px solid green";
    }
}
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $(".team-member-card").on('mouseover', function() {
        $(this).removeClass('shadow');
        $(this).addClass("shadow-lg");
        $(this).css({ cursor: 'pointer' });
    });
    $("#messageForm").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: $(this).serializeArray(),
            beforeSend: () => {
                $("#send-btn").attr('disabled', true);
                $("#send-btn").html("<span class='spinner-border spinner-border-sm text-light'></span> sending...")
            },
            success: (data) => {
                $(".response").html(data);
            },
            complete: () => {
                $("#send-btn").attr('disabled', false);
                $("#send-btn").html("SEND MESSAGE");
            }
        })
    })
});