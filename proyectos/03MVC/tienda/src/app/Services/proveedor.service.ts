import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Iproveedor } from '../Interfaces/iproveedor';

@Injectable({
  providedIn: 'root'
})
export class ProveedorService {
  apiUrl = 'http://localhost/6semestre/proyectos/03MVC/controllers/proveedores.controller.php?op=';
  prove: Iproveedor[] = [];

  constructor(private lector: HttpClient) { }

  todos(): Observable<Iproveedor[]> {
    console.log(this.apiUrl + 'todos');
    return this.lector.get<Iproveedor[]>(this.apiUrl + 'todos');
  }

  eliminar(idProveedor: number): Observable<number> {
    console.log(idProveedor)
    const formData = new FormData();
    formData.append('idProveedores', idProveedor.toString());
    return this.lector.post<number>(this.apiUrl + 'eliminar', formData);
  }

}
