const track = document.getElementById('clientTrack');
let scrollAmount = 0;
let isPaused = false;

function autoScroll() {
  if (!isPaused) {
    scrollAmount += 1;
    if (scrollAmount >= track.scrollWidth / 2) {
      scrollAmount = 0;
    }
    track.scrollTo({
      left: scrollAmount,
      behavior: 'smooth'
    });
  }
  requestAnimationFrame(autoScroll);
}

// Pause on hover
track.addEventListener('mouseenter', () => {
  isPaused = true;
});
track.addEventListener('mouseleave', () => {
  isPaused = false;
});

autoScroll();
