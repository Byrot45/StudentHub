let workTime = 25 * 60; // 25 minutos en segundos
let breakTime = 5 * 60; // 5 minutos en segundos
let timer;
let isWorking = true;

const minutesElement = document.getElementById('minutes');
const secondsElement = document.getElementById('seconds');
const startButton = document.getElementById('start');
const resetButton = document.getElementById('reset');
const statusElement = document.getElementById('status');

function updateTimer() {
    const minutes = Math.floor(workTime / 60);
    const seconds = workTime % 60;

    minutesElement.textContent = String(minutes).padStart(2, '0');
    secondsElement.textContent = String(seconds).padStart(2, '0');

    if (workTime === 0) {
        clearInterval(timer);
        if (isWorking) {
            workTime = breakTime;
            statusElement.textContent = "¡Tiempo de descanso!";
        } else {
            workTime = 25 * 60;
            statusElement.textContent = "Tiempo de trabajo";
        }
        isWorking = !isWorking;
        startButton.textContent = "Iniciar";
    } else {
        workTime--;
    }
}

startButton.addEventListener('click', () => {
    if (startButton.textContent === "Iniciar") {
        timer = setInterval(updateTimer, 1000);
        startButton.textContent = "Pausar";
    } else {
        clearInterval(timer);
        startButton.textContent = "Iniciar";
    }
});

resetButton.addEventListener('click', () => {
    clearInterval(timer);
    workTime = 25 * 60;
    isWorking = true;
    minutesElement.textContent = "25";
    secondsElement.textContent = "00";
    statusElement.textContent = "Tiempo de trabajo";
    startButton.textContent = "Iniciar";
});