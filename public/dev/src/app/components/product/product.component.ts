import { Component, OnInit } from '@angular/core';
import { Response } from '@angular/http';

import { AuthenticationService } from '../../services/authentication/authentication.service';
import { HttpClientService } from '../../services/httpClient/httpClient.service';

@Component({
  moduleId: module.id,
  selector: 'app-product',
  templateUrl: './product.component.html'
})
export class ProductComponent implements OnInit {
  public productTypes: any = [];
  public products: any = [];
  public product: any = {
    name: "",
    description: "",
    active: true,
    product_type_name: "",
    product_type_id: 0
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

  public clearInput(event: Event){
    event.preventDefault();
    this.product = {
      name: "",
      description: "",
      active: true,
      product_type_name: "",
      product_type_id: 0
    };
  }

  public cancleEdit(event: Event): void {
    event.preventDefault();
    this.isEdit = false;
  }

  public loadData(): void {
    this.httpClientService.get('/api/product').subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );
  }

  public reloadData(arr_datas): void {
    this.productTypes.splice(0, this.productTypes.length);
    for (let productType of arr_datas['productTypes']) {
      this.productTypes.push(productType);
    }

    this.products.splice(0, this.products.length);
    for (let product of arr_datas['products']) {
      this.products.push(product);
    }

    this.product = {
      name: "",
      description: "",
      active: true,
      product_type_name: "",
      product_type_id: 0
    };
  }

  public loadProduct(id: number): void {
    let currentProduct = this.products.find(function (o) {
      return o.id == id;
    });

    this.product = currentProduct;

    this.isEdit = true;
  }

  public addProduct(event: Event): void {
    event.preventDefault();

    this.httpClientService.post('/api/product', { "product": this.product }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );
  }

  public updateProduct(event: Event): void {
    event.preventDefault();

    this.httpClientService.put('/api/product/', { "product": this.product} ).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );

    this.isEdit = false;
  }

  public deactiveProduct(id: number): void {
    this.httpClientService.patch('/api/product', { "id": id }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    )
  }

  public deleteProduct(id: number): void {
    this.httpClientService.delete('/api/product/' + id).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    )
  }
}
