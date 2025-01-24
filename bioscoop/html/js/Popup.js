document.addEventListener('DOMContentLoaded', function() {
    // Feedback Popup
    const popup = document.getElementById('feedback-popup');
    const closeBtn = document.querySelector('.popup .close');
    const feedbackImages = document.querySelectorAll('.feedback-img');
    const feedbackForm = document.querySelector('.popup-content form');
    let popupInterval;

    function showPopup() {
        popup.style.display = 'block';
    }

    function hidePopup() {
        popup.style.display = 'none';
    }

    closeBtn.addEventListener('click', hidePopup);

    function randomInterval() {
        const min = 64000;
        const max = 128000;
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function schedulePopup() {
        popupInterval = setTimeout(function() {
            showPopup();
            schedulePopup();
        }, randomInterval());
    }

    schedulePopup();

    feedbackImages.forEach(img => {
        img.addEventListener('click', function() {
            feedbackImages.forEach(img => img.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    feedbackForm.addEventListener('submit', function(event) {
        event.preventDefault();
        hidePopup();
        alert('Bedankt voor uw feedback!');

        clearTimeout(popupInterval);
        setTimeout(schedulePopup, randomInterval() * 200);
    });

    // New Text Popup
    const textPopup = document.getElementById('text-popup');
    const textCloseBtn = textPopup.querySelector('.close');

    function showTextPopup() {
        textPopup.style.display = 'block';
    }

    function hideTextPopup() {
        textPopup.style.display = 'none';
        localStorage.setItem('textPopupSeen', 'true'); // Save to localStorage
    }

    textCloseBtn.addEventListener('click', hideTextPopup);

    // Show the text popup immediately when the user enters the website if not seen before
    if (!localStorage.getItem('textPopupSeen')) {
        showTextPopup();
    }
});