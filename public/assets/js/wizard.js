const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress_form");
const formSteps = document.querySelectorAll(".form-step");
const formStepsBaru = document.querySelectorAll(".form-step-pasienBaru");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;
let formStepsBaruNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (formStepsNum < formSteps.length - 1) {
      formStepsNum++;
      updateFormSteps();
      updateProgressbar();
    } else if (formStepsBaruNum < formStepsBaru.length - 1) {
      formStepsBaruNum++;
      updateFormStepsBaru();
    }
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (formStepsBaruNum > 0) {
      formStepsBaruNum--;
      updateFormStepsBaru();
    } else if (formStepsNum > 0) {
      formStepsNum--;
      updateFormSteps();
      updateProgressbar();
    }
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateFormStepsBaru() {
  formStepsBaru.forEach((formStep) => {
    formStep.classList.remove("form-stepBaru-active");
  });

  formStepsBaru[formStepsBaruNum].classList.add("form-stepBaru-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

// Langsung memulai dari langkah kedua saat halaman dimuat
formStepsNum = 1;
updateFormSteps();
updateProgressbar();
