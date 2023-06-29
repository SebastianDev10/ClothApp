class ProjectSearch {
    constructor(searchInput, projectContainer) {
      this.searchInput = searchInput;
      this.projectContainer = projectContainer;
    }
  
    init() {
      this.searchInput.addEventListener("keyup", this.handleSearch.bind(this));
    }
  
    handleSearch(event) {
      if (event.key === "Enter") {
        event.preventDefault();
  
        const data = { search: this.searchInput.value };
  
        fetch("/search", {
          method: "POST",
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(projects => {
          this.clearProjectContainer();
          this.loadProjects(projects);
        });
      }
    }
  
    loadProjects(projects) {
      projects.forEach(project => {
        this.createProject(project);
      });
    }
  
    createProject(project) {
      const template = document.querySelector("#project-template");
  
      const clone = template.content.cloneNode(true);
      const div = clone.querySelector("div");
      div.id = project.id;
      const image = clone.querySelector("img");
      image.src = `/public/img/uploads/${project.image}`;
      const title = clone.querySelector("h2");
      title.innerHTML = project.title;
      const description = clone.querySelector("p");
      description.innerHTML = project.description;
      const like = clone.querySelector(".fa-heart");
      like.innerText = project.like;
      const dislike = clone.querySelector(".fa-minus-square");
      dislike.innerText = project.dislike;
  
      this.projectContainer.appendChild(clone);
    }
  
    clearProjectContainer() {
      this.projectContainer.innerHTML = "";
    }
  }
  
  const searchInput = document.querySelector('input[placeholder="search project"]');
  const projectContainer = document.querySelector(".projects");
  
  const projectSearch = new ProjectSearch(searchInput, projectContainer);
  projectSearch.init();
  
