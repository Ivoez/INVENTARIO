const postGradoCourses = [ 
    {
        id: 'carrera1',
        title: 'Ingenieria de Sistemas',
        image: '../public/img/GestionProyectosTecnologicos.jpg',
        thumb: '../public/img/GestionProyectosTecnologicos.jpg',
        description: 'La Ingeniería de Sistemas es una disciplina multidisciplinaria que se enfoca en el diseño, desarrollo, implementación y gestión de sistemas complejos, que pueden ser de hardware, software, sistemas de información, o incluso procesos de negocios.'
    },
    {
        id: 'carrera2',
        title: 'Desarrollo de Software',
        image: '',
        thumb: '',
        description: 'El desarrollo de software es el proceso de creación, diseño, implementación y mantenimiento de programas informáticos. Implica una serie de actividades que van desde la conceptualización de una idea hasta la entrega de un producto funcional y probado. '
    },
    {
        id: 'carrera3',
        title: 'Tecnologia De la Informacion',
        image: '',
        thumb: '',
        description: 'La Tecnología de la Información (TI) se refiere al uso de herramientas y tecnologías para crear, almacenar, proteger, y compartir información digital. Esto incluye hardware, software, redes, y los procesos necesarios para gestionar la información de manera eficiente.'
    },
    {
        id: 'carrera4',
        title: 'Gestión de Proyectos Tecnológicos',
        image: '',
        thumb: '',
        description: 'La gestión de proyectos tecnológicos implica planificar, ejecutar, supervisar y controlar proyectos que involucran tecnología, ya sea software, hardware, infraestructura o aplicaciones. Esto incluye desde la implementación de nuevos sistemas informáticos hasta el desarrollo de soluciones innovadoras. '
    }
 ]; // <-- Aquí van tus objetos de curso como ya lo pusiste

const Container = document.getElementById('postGradoContainer');

postGradoCourses.forEach(course => {
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
  Container.appendChild(col);
});

function openCourse(courseId) {
  const course = postGradoCourses.find(c => c.id === courseId);
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
