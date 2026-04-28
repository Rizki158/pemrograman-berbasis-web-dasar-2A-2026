
const cards = document.querySelectorAll('.shadow-lg');

cards.forEach(card => {
card.addEventListener('mouseenter', () => {
    card.style.transform = 'scale(1.05)';
    card.style.transition = '0.3s ease';
    card.style.boxShadow = '0 15px 30px rgba(0,0,0,0.2)';
});

card.addEventListener('mouseleave', () => {
    card.style.transform = 'scale(1)';
    card.style.boxShadow = '';
});
});

const buttons = document.querySelectorAll('button');

buttons.forEach(btn => {
btn.addEventListener('mouseenter', () => {
    btn.style.transform = 'scale(1.1)';
    btn.style.transition = '0.3s ease';
});

btn.addEventListener('mouseleave', () => {
    btn.style.transform = 'scale(1)';
});
});


const darkToggle = document.querySelector('#darktoggle');
  darkToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');

    if (document.body.classList.contains('dark-mode')) {

        document.body.style.backgroundColor = '#111827';
        document.body.style.color = 'white';

      // NAVBAR
        document.querySelector('nav').style.backgroundColor = '#111827';

      // SECTION 
        const home = document.querySelector('#Home');
        home.style.backgroundColor = '#1f2937';
        
        const pages = document.querySelector('#pages');
        pages.style.backgroundColor = '#1f2967';
        
        const courses = document.querySelector('#courses');
        courses.style.backgroundColor = '#1f2937';
        
        // CARD`
        document.querySelectorAll('.shadow-lg').forEach(card => {
            card.style.backgroundColor = '#374151';
            card.style.color = 'white';
        });
        
    } else {
        // LIGHT MODE
        
        // BODY
        document.body.style.backgroundColor = '';
        document.body.style.color = '';
        
        // NAVBAR
        document.querySelector('nav').style.backgroundColor = '';
        
        const home = document.querySelector('#Home');
        home.style.backgroundColor = '';
        
        const pages = document.querySelector('#pages');
        pages.style.backgroundColor = '';
        
        const courses = document.querySelector('#courses');
        courses.style.backgroundColor = '';
        
        // CARD
        document.querySelectorAll('.shadow-lg').forEach(card => {
        card.style.backgroundColor = '';
        card.style.color = '';
      });
    }
  });
