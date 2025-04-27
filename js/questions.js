const questions = document.querySelectorAll('.questions__item');

function rotateIcon(icon, isOpen) {
  icon.style.transform = isOpen ? 'rotate(-180deg)' : '';
}

function closeAllAnswers() {
  questions.forEach(q => {
    const ans = q.querySelector('.questions__answer');
    const icn = q.querySelector('.questions__icon');
    ans.classList.remove('open');
    rotateIcon(icn, false);
  });
}

questions.forEach(question => {
  const header = question.querySelector('.questions__inner');
  const answer = question.querySelector('.questions__answer');
  const icon = question.querySelector('.questions__icon');

  // Перевіряємо початковий стан і відповідно обертаємо іконку
  if (answer.classList.contains('open')) {
    rotateIcon(icon, true);
  }

  // Водночас відкриваємо лише одну відповідь
  header.addEventListener('click', () => {
    closeAllAnswers(); // Закриваємо всі відповіді перед відкриттям нової
    
    const isOpen = !answer.classList.contains('open'); // Перевіряємо новий стан
    answer.classList.toggle('open');
    rotateIcon(icon, isOpen);
  });
});
