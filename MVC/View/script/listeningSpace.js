const audioPlayer = document.getElementById('audioPlayer');
const progressContainer = document.getElementById('progressContainer');
const progress = document.getElementById('progress');
const currentTime = document.getElementById('currentTime');
const duration = document.getElementById('duration');

const mainControlBtn = document.getElementById('mainControlBtn');
const mainControlIcon = document.getElementById('mainControlIcon');
const lyricsBtn = document.getElementById('lyricsBtn');
const lyricsIcon = document.getElementById('lyricsIcon');
const backBtn = document.getElementById('backBtn');
const backIcon = document.getElementById('backIcon');
const nextBtn = document.getElementById('nextBtn');
const nextIcon = document.getElementById('nextIcon');
const returnBtn = document.getElementById('returnBtn');
const returnIcon = document.getElementById('returnIcon');

const infoBtn = document.getElementById('info');
const infoIcon = document.getElementById('infoIcon');
const volumnContainer = document.getElementById('volumnContainer');
const outputBtn = document.getElementById('output');
const outputIcon = document.getElementById('outputIcon');

// Play or Resume the song
mainControlBtn.addEventListener('click', () => {
    if (audioPlayer.paused) {
        audioPlayer.play();
        mainControlIcon.setAttribute('icon', 'material-symbols:pause-rounded');
    } else {
        audioPlayer.pause();
        mainControlIcon.setAttribute('icon', 'solar:play-bold');
    }
});

// Update progress
audioPlayer.addEventListener('timeupdate', () => {
    const { currentTime, duration } = audioPlayer;
    const progressPercent = (currentTime / duration) * 100;
    progress.style.width = `${progressPercent}%`;

    // Update current time
    const currentMinutes = Math.floor(currentTime / 60);
    const currentSeconds = Math.floor(currentTime % 60);
    currentTime.textContent = `${currentMinutes}:${currentSeconds < 10 ? '0' : ''}${currentSeconds}`;

    const durationMinutes = Math.floor(duration / 60);
    const durationSeconds = Math.floor(duration % 60);
    duration.textContent = `${durationMinutes}:${durationSeconds < 10 ? '0' : ''}${durationSeconds}`;
});

//Change progress when user click on progress container
progressContainer.addEventListener('click', (e) => {
    const width = progressContainer.clientWidth;
    const clickX = e.offsetX;
    const duration = audioPlayer.duration;
    audioPlayer.currentTime = (clickX / width) * duration;
});

//Change color button
lyricsBtn.addEventListener('click', () => {
    lyricsIcon.classList.toggle('icon-active');
});

returnBtn.addEventListener('click', () => {
    returnIcon.classList.toggle('icon-active');
})

infoBtn.addEventListener('click', () => {
    infoIcon.classList.toggle('icon-active');
});

outputBtn.addEventListener('click', () => {
    outputIcon.classList.toggle('icon-active');
    if (outputIcon.classList.contains('icon-active')) {
        audioPlayer.muted = false;
        volumnContainer.style.backgroundColor = '';
    } else {
        audioPlayer.muted = true;
        volumnContainer.style.backgroundColor = '#5c5c5c';
    }
})

// Change volumn when change column slider
volumnContainer.addEventListener('input', (e) => {
    const volumnValue = e.target.value / 100;
    audioPlayer.volume = volumnValue;
    audioPlayer.muted = false;
    if (volumnValue === 0) {
        outputIcon.classList.remove('icon-active');
    } else {
        outputIcon.classList.add('icon-active');
    }

});
