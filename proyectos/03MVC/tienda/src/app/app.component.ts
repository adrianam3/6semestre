import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { ProveedorService } from './Services/proveedor.service';
import { Iproveedor } from './Interfaces/iproveedor';

import Swal from 'sweetalert2';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'Lista de Proveedores';

  listaProveedores: Iproveedor[] = [];
  constructor(private ServicioProveedor: ProveedorService) { }

  ngOnInit(): void {
    this.cargatabla();
  };

  cargatabla() {
    this.ServicioProveedor.todos().subscribe((data) => {
      this.listaProveedores = data;
    });
  }

  eliminar(idProveedor: number) {
    console.log('en controlador ' + idProveedor);
    Swal.fire({
      title: "¿Estás seguro?",
      text: "Una vez eliminado, no podrás recuperar este proveedor",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, eliminar"
    }).then((result) => {
      if (result.isConfirmed) {
        this.ServicioProveedor.eliminar(idProveedor).subscribe((data) => {
          console.log(data);
        }
        );
        // this.ServicioProveedor.eliminar(idProveedor).subscribe(
        //   (data) => {
        //     // this.listaProveedores = data;
        //     Swal.fire({
        //       title: "Eliminado",
        //       text: "El proveedor ha sido eliminado",
        //       icon: "success"
        //     });

        //   }
        // )
      }
    });
  }

};