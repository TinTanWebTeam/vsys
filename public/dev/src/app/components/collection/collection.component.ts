import { Component, OnInit } from '@angular/core';
import { Response } from '@angular/http';

import { AuthenticationService } from '../../services/authentication/authentication.service';
import { HttpClientService } from '../../services/httpClient/httpClient.service';

@Component({
  selector: 'app-collection',
  templateUrl: './collection.component.html'
})
export class CollectionComponent implements OnInit {
  public collections: any = [];
  public collection: any = {
    name: "",
    description: "",
    active: true
  };
  public isEdit: boolean = false;

  /**
   *
   */
  constructor(private authenticationService: AuthenticationService, private httpClientService: HttpClientService) {
    //called first time before the ngOnInit();
  }

  ngOnInit() {
    //called after the constructor and called  after the first ngOnChanges() 
    this.loadData();
  }

  public clearInput(event: Event) {
    event.preventDefault();
    this.collection = {
      name: "",
      description: "",
      active: true
    };
  }

  public cancleEdit(event: Event): void {
    event.preventDefault();
    this.isEdit = false;
  }

  public loadData(): void {
    this.httpClientService.get('/api/collection').subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );
  }

  public reloadData(arr_datas): void {
    this.collections.splice(0, this.collections.length);
    for (let collection of arr_datas['collections']) {
      this.collections.push(collection);
    }

    this.collection = {
      name: "",
      description: "",
      active: true
    };
  }

  public loadCollection(id: number): void {
    let currentCollection = this.collections.find(function (o) {
      return o.id == id;
    });

    this.collection = currentCollection;

    this.isEdit = true;
  }

  public addCollection(event: Event): void {
    event.preventDefault();

    this.httpClientService.post('/api/collection', { "collection": this.collection }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );
  }

  public updateCollection(event: Event): void {
    event.preventDefault();

    this.httpClientService.put('/api/collection/', { "collection": this.collection }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );

    this.isEdit = false;
  }

  public deactiveCollection(id: number): void {
    this.httpClientService.patch('/api/collection', { "id": id }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    )
  }

  public deleteCollection(id: number): void {
    this.httpClientService.delete('/api/collection/' + id).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    )
  }

}
