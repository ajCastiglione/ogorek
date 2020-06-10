// FAQs page
function toggleFAQ($) {
  let questions = $(".faqs__question");

  questions.on("click", (e) => {
    let self = $(e.target);
    // Traverses DOM until it gets the right level
    let question =
      self.is("span") || self.is("i") ? self.parentsUntil(".text") : self;

    // Setting active class to question toggled to enable animation
    question.toggleClass("active");

    // Selects the correct answer to toggle the visibility of
    let answerToToggle = question.next();

    answerToToggle.slideToggle(300, function () {
      answerToToggle.toggleClass("active");
    });
  });
}

export default toggleFAQ;
