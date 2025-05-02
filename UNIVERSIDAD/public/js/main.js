const courses = [
  {
    id: 'course1',
    title: 'Curso de Marketing Digital',
    image: 'https://via.placeholder.com/300',
    thumb: 'https://via.placeholder.com/150',
    description: 'Aprende todo sobre marketing digital, desde SEO hasta estrategias avanzadas.'
  },
  {
    id: 'course2',
    title: 'Curso de Desarrollo Web',
    image: 'https://via.placeholder.com/300',
    thumb: 'https://via.placeholder.com/150',
    description: 'Aprende HTML, CSS, JavaScript y más para crear sitios web modernos y funcionales.'
  },
  {
    id: 'course3',
    title: 'Curso de Gestión de Proyectos',
    image: 'https://via.placeholder.com/300',
    thumb: 'https://via.placeholder.com/150',
    description: 'Domina la planificación, ejecución y monitoreo de proyectos exitosos.'
  },
  {
    id: 'course4',
    title: 'Curso de Fotografía Profesional',
    image: 'https://via.placeholder.com/300',
    thumb: 'https://via.placeholder.com/150',
    description: 'Aprende desde los fundamentos hasta técnicas avanzadas para convertirte en fotógrafo profesional.'
  },
  {
    id: 'course5',
    title: 'Curso de Idiomas Online',
    image: 'https://via.placeholder.com/300',
    thumb: 'https://via.placeholder.com/150',
    description: 'Estudia inglés, francés, alemán y más desde la comodidad de tu hogar.'
  }
];

const courseContainer = document.getElementById('courseContainer');

courses.forEach(course => {
  const col = document.createElement('div');
  col.className = 'col-md-4 mb-4';

  col.innerHTML = `
    <div class="card" role="button" tabindex="0" onclick="openCourse('${course.id}')" onkeypress="if(event.key === 'Enter') openCourse('${course.id}')">
      <img src="${course.thumb}" class="card-img-top" alt="${course.title}">
      <div class="card-body">
        <h5 class="card-title">${course.title}</h5>
        <p class="card-text">${course.description}</p>
      </div>
    </div>
  `;

  courseContainer.appendChild(col);
});

function openCourse(courseId) {
  const course = courses.find(c => c.id === courseId);
  const sidebar = document.getElementById('mySidebar');
  if (course) {
    sidebar.style.display = 'block';
    setTimeout(() => {
      sidebar.classList.add('show');
    }, 10);
    sidebar.setAttribute('aria-hidden', 'false');
    document.getElementById('courseTitle').innerText = course.title;
    document.getElementById('courseImage').src = course.image;
    document.getElementById('courseImage').alt = course.title;
    document.getElementById('courseDescription').innerText = course.description;
  }
}

function closeCourse() {
  const sidebar = document.getElementById('mySidebar');
  sidebar.classList.remove('show');
  sidebar.setAttribute('aria-hidden', 'true');
  setTimeout(() => {
    sidebar.style.display = 'none';
  }, 500);
}
