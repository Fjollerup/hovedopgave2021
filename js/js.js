// DYNAMISK <title>
// -----------------------------------------------------
// Vi søger efter #title i DOM. Returneres den succesfuldt får vi textContent, og finder vi en ampersand (&amp;) erstatter vi den med & gennem replace().
// Så tildeles værdien til <title>.
// Hvis der ikke er findes noget #title element vil den .? ikke obligatoriske kæde afbrydes og være undefined,
// som så udløser ?? nullish coalescing operatoren, og DOM <title> vil i stedet blive sat til "Torsted Dækmontage"
    
  document.title = document.getElementById('title')?.textContent.replace(/&amp;/g, '&') ?? "Torsted Dækmontage";

// SCROLL MENU
// -----------------------------------------------------
// Denne tilføjer .scroll-up, som i css'en viser navbar__header
// Og skifter den ud med .scroll-down, som skjuler navbar__header
const body = document.body;
const nav = document.querySelector(".navbar");
// const menu = document.querySelector("#hamburger");
const scrollUp = "scroll-up";
const scrollDown = "scroll-down";
let lastScroll = 0;
 
window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll == 0) {
    body.classList.remove(scrollUp);
    return;
  }
    
  if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
    // down
    body.classList.remove(scrollUp);
    body.classList.add(scrollDown);
  } else if (currentScroll < lastScroll && body.classList.contains(scrollDown)) {
    // up
    body.classList.remove(scrollDown);
    body.classList.add(scrollUp);
  }
  lastScroll = currentScroll;
});

// function til at fjerne baggrunden på navbar, hvis hero elementet er i viewporten.
const hero = document.querySelector('#hero')

const options = {
    threshhold: 0, //så snart elementet i det hele taget er i viewporten
    rootMargin: '-80px', //threshold - rootMargin. giver plads til hele navbar, inden functionen udløses.
}

const observer = new IntersectionObserver(function(entries, observer) {
    entries.forEach(entry => {
        console.log(entry)
        nav.classList.toggle('navbar--top')
    })
}, options)

observer.observe(hero)