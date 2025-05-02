const postGradoCourses = [
    {
        id: 'carrera1',
        title: 'Licenciatura en Sistemas de Informacion',
        image: '../public/img/IngenieriaDeSistemas.jpg',
        thumb: '../public/img/IngenieriaDeSistemas.jpg',
        description: 'La Licenciatura en Sistemas de Información se enfoca en el desarrollo, implementación y gestión de sistemas que procesan y administran información. Los Licenciados en esta área combinan conocimientos de tecnología y negocio para crear soluciones que optimizan la toma de decisiones en las organizaciones. Su trabajo incluye el diseño de bases de datos, la programación de aplicaciones, y la integración de tecnologías emergentes, garantizando que los sistemas sean eficientes, seguros y alineados con las necesidades del usuario.'
    },
    {
        id: 'carrera2',
        title: 'Desarrollo de Software',
        image: '../public/img/DesarrolloDeSoftware.jpg',
        thumb: '../public/img/DesarrolloDeSoftware.jpg',
        description: 'El desarrollo de software es el proceso de creación, diseño, implementación y mantenimiento de programas informáticos. Implica una serie de actividades que van desde la conceptualización de una idea hasta la entrega de un producto funcional y probado. '
    },
    {
        id: 'carrera3',
        title: 'Tecnologia De la Informacion',
        image: '../public/img/TecnologiaDeLaInformacion.jpeg',
        thumb: '../public/img/TecnologiaDeLaInformacion.jpeg',
        description: 'La Tecnología de la Información (TI) se refiere al uso de herramientas y tecnologías para crear, almacenar, proteger, y compartir información digital. Esto incluye hardware, software, redes, y los procesos necesarios para gestionar la información de manera eficiente.'
    },
    {
        id: 'carrera4',
        title: 'Gestión de Proyectos Tecnológicos',
        image: '../public/img/GestionProyectosTecnologicos.jpg',
        thumb: '../public/img/GestionProyectosTecnologicos.jpg',
        description: 'La gestión de proyectos tecnológicos implica planificar, ejecutar, supervisar y controlar proyectos que involucran tecnología, ya sea software, hardware, infraestructura o aplicaciones. Esto incluye desde la implementación de nuevos sistemas informáticos hasta el desarrollo de soluciones innovadoras. '
    },
    {
        id: 'carrera5',
        title: 'Licenciatura en Robotica',
        image: '../public/img/Lic-Robotica.jpg',
        thumb: '../public/img/Lic-Robotica.jpg',
        description: 'La Licenciatura en Robótica es una carrera interdisciplinaria que combina conocimientos de ingeniería, informática y automatización para diseñar, construir y mantener sistemas robóticos. Esta disciplina aborda tanto los aspectos teóricos como prácticos de la robótica, preparando a los estudiantes para enfrentar los desafíos en un campo en constante evolución.'
    },
    {
        id: 'carrera6',
        title: 'Mestria en Inteligencia Artificial',
        image: '../public/img/MaestEnIntArt.jpg',
        thumb: '../public/img/MaestEnIntArt.jpg',
        description: 'La Maestría en Inteligencia Artificial (IA) es un programa avanzado diseñado para formar expertos en el desarrollo y aplicación de tecnologías que simulan la inteligencia humana. Esta combina maestría teoría, práctica y ética en el uso de la IA, preparando a los estudiantes para abordar problemas complejos en diversas industrias.'
    },
  ];
  
  const container = document.getElementById('postGradoContainer');
  
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
  
    container.appendChild(col);
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
 
  //console.log("Cantidad de carreras cargadas: ", document.querySelectorAll('.card').length);

  
