
class LikeDislikeButtons {
    constructor(likeButtons, dislikeButtons) {
      this.likeButtons = likeButtons;
      this.dislikeButtons = dislikeButtons;
    }
  
    init() {
      this.likeButtons.forEach(button => button.addEventListener("click", this.giveLike.bind(this)));
      this.dislikeButtons.forEach(button => button.addEventListener("click", this.giveDislike.bind(this)));
    }
  
    giveLike(event) {
      const likes = event.target;
      const container = likes.parentElement.parentElement.parentElement;
      const id = container.getAttribute("id");
  
      fetch(`/like/${id}`)
        .then(() => {
          likes.innerHTML = parseInt(likes.innerHTML) + 1;
        });
    }
  
    giveDislike(event) {
      const dislikes = event.target;
      const container = dislikes.parentElement.parentElement.parentElement;
      const id = container.getAttribute("id");
  
      fetch(`/dislike/${id}`)
        .then(() => {
          dislikes.innerHTML = parseInt(dislikes.innerHTML) + 1;
        });
    }
  }
  
  const likeButtons = document.querySelectorAll(".fa-heart");
  const dislikeButtons = document.querySelectorAll(".fa-minus-square");
  
  const likeDislike = new LikeDislikeButtons(likeButtons, dislikeButtons);
  likeDislike.init();
