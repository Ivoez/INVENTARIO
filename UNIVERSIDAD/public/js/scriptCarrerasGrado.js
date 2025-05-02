const CarrerasDeGrado = [
  {
    id: 'carrera1',
    title: 'Ingenieria en Sistemas',
    image: '../public/img/Ing-Sistema.jpg',
    thumb: '../public/img/Ing-Sistema.jpg',
    description: 'La Ingeniería en Sistemas se dedica al diseño, implementación y gestión de sistemas informáticos. Los ingenieros en sistemas desarrollan software y soluciones tecnológicas, asegurando que los sistemas funcionen de manera eficiente y satisfagan las necesidades de los usuarios y las organizaciones.'
  },
  {
    id: 'carrera2',
    title: 'Ingenieria en Informatica',
    image: '../public/img/Ing-Informatica.jpg',
    thumb: '../public/img/Ing-Informatica.jpg',
    description: 'La Ingeniería en Informática se enfoca en la creación y gestión de software y aplicaciones. Los ingenieros en informática desarrollan soluciones digitales, desde aplicaciones móviles hasta sistemas complejos, y se especializan en áreas como inteligencia artificial, bases de datos y seguridad informática.'
  },
  {
    id: 'carrera3',
    title: 'Ingenieria Electronica',
    image: '../public/img/Ing-Electronica.jpg',
    thumb: '../public/img/Ing-Electronica.jpg',
    description: 'La Ingeniería Electrónica se centra en el desarrollo y diseño de circuitos y sistemas electrónicos. Los ingenieros electrónicos trabajan en áreas como comunicaciones, automatización y control, utilizando su conocimiento para innovar en dispositivos y tecnologías que mejoran la vida cotidiana.'
  },
  {
    id: 'carrera4',
    title: 'Ingenieria Industrial',
    image: '../public/img/Iing-industrial.jpg',
    thumb: '../public/img/Iing-industrial.jpg',
    description: 'La Ingeniería Industrial busca optimizar procesos y sistemas en entornos productivos y organizacionales. Los ingenieros industriales analizan y mejoran la eficiencia de las operaciones, gestionando recursos humanos, materiales y tecnológicos para maximizar la productividad y reducir costos.'
  },
  {
    id: 'carrera5',
    title: 'Ingenieria Mecanica',
    image: '../public/img/Ing-Mecanica.jpg',
    thumb: '../public/img/Ing-Mecanica.jpg',
    description: 'La Ingeniería Mecánica se ocupa del diseño, análisis y fabricación de maquinaria y componentes mecánicos. Los ingenieros mecánicos aplican principios de física y materiales para crear soluciones innovadoras en diversas industrias, desde automotriz hasta aeroespacial.'
  },
  {
    id: 'carrera6',
    title: 'Ingenieria Civil',
    image: '../public/img/Ing-Civil.jpg',
    thumb: '../public/img/Ing-Civil.jpg',
    description: 'La Ingeniería Civil se enfoca en el diseño, construcción y mantenimiento de infraestructuras, como edificios, puentes y caminos. Los ingenieros civiles aplican principios científicos y matemáticos para resolver problemas relacionados con la construcción y el medio ambiente, garantizando la seguridad y funcionalidad de los proyectos.'
  }
];

// Obtenemos el contenedor donde se insertarán los cursos
const Container = document.getElementById('CarrerasDeGradoContainer');

// Iteramos sobre cada curso para crear dinámicamente su card 
CarrerasDeGrado.forEach(course => {
  const col = document.createElement('div');
  col.className = 'col-md-4 mb-4';

  // Generamos la tarjeta del curso con imagen, titulo y descripcion
  col.innerHTML = `
    <div class="card" role="button" tabindex="0" onclick="openCourse('${course.id}')" onkeypress="if(event.key === 'Enter') openCourse('${course.id}')">
      <img src="${course.thumb}" class="card-img-top" alt="${course.title}">
      <div class="card-body">
        <h5 class="card-title">${course.title}</h5>
        <p class="card-text">${course.description}</p>
      </div>
    </div>
  `;
  // Agregamos la tarjeta al contenedor en el DOM
  Container.appendChild(col);
});

// Muestra el sidebar con la información detallada
function openCourse(carreraId) {
  const carrera = CarrerasDeGrado.find(c => c.id === carreraId);
  const sidebar = document.getElementById('mySidebar');
  
  if (carrera) {
    sidebar.style.width = "250px"; // Aquí cambiamos el width
    sidebar.setAttribute('aria-hidden', 'false');
    
    // Actualizamos el contenido del sidebar con la información de la carrera seleccionada
    document.getElementById('courseTitle').innerText = carrera.title;
    document.getElementById('courseImage').src = carrera.image;
    document.getElementById('courseImage').alt = carrera.title;
    document.getElementById('courseDescription').innerText = carrera.description;
  }
}

// Oculta el sidebar
function closeCourse() {
  const sidebar = document.getElementById('mySidebar');
  sidebar.style.width = "0"; // Cambiamos el width a 0 para cerrar el sidebar
  sidebar.setAttribute('aria-hidden', 'true');
}
