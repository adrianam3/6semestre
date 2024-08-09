import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Iproveedor } from '../Interfaces/iproveedor';

@Injectable({
  providedIn: 'root'
})
export class ProveedorService {
  apiUrl = 'http://localhost/6semestre/proyectos/03MVC/controllers/proveedores.controller.php?op=';


  constructor(private lector: HttpClient) { }

todo():Observable<Iproveedor[]> {
  return this.lector.get<Iproveedor[]>(this.apiUrl+'todos');
}

}
