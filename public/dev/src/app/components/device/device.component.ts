import { Component, OnInit } from '@angular/core';
import { Response } from '@angular/http';

import { AuthenticationService } from '../../services/authentication/authentication.service';
import { HttpClientService } from '../../services/httpClient/httpClient.service';


@Component({
  selector: 'app-device',
  templateUrl: './device.component.html'
})
export class DeviceComponent implements OnInit {

  public collections: any = [];
  public io_centers: any = [];
  public devices: any = [];
  public device: any = {
    name: "",
    description: "",
    input: "",
    output: "",
    active: true,
    collect_name: "",
    collect_id: 0,
    io_center_name: "",
    io_center_id: 0,
    parent_name: "",
    parent_id: 0
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
    this.device = {
      name: "",
      description: "",
      input: "",
      output: "",
      active: true,
      collect_name: "",
      collect_id: 0,
      io_center_name: "",
      io_center_id: 0,
      parent_name: "",
      parent_id: 0
    };
  }

  public cancleEdit(event: Event): void {
    event.preventDefault();
    this.isEdit = false;
  }

  public loadData(): void {
    this.httpClientService.get('/api/device').subscribe(
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

    this.io_centers.splice(0, this.io_centers.length);
    for (let io_center of arr_datas['io_centers']) {
      this.io_centers.push(io_center);
    }

    this.devices.splice(0, this.devices.length);
    for (let device of arr_datas['devices']) {
      this.devices.push(device);
    }

    this.device = {
      name: "",
      description: "",
      input: "",
      output: "",
      active: true,
      collect_name: "",
      collect_id: 0,
      io_center_name: "",
      io_center_id: 0,
      parent_name: "",
      parent_id: 0
    };
  }

  public loadDevice(id: number): void {
    let currentDevice = this.devices.find(function (o) {
      return o.id == id;
    });

    this.device = currentDevice;

    this.isEdit = true;
  }

  public addDevice(event: Event): void {
    event.preventDefault();

    this.httpClientService.post('/api/device', { "device": this.device }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );
  }

  public updateDevice(event: Event): void {
    event.preventDefault();

    this.httpClientService.put('/api/device/', { "device": this.device }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    );

    this.isEdit = false;
  }

  public deactiveDevice(id: number): void {
    this.httpClientService.patch('/api/device', { "id": id }).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    )
  }

  public deleteDevice(id: number): void {
    this.httpClientService.delete('/api/device/' + id).subscribe(
      (success: Response) => {
        this.reloadData(success.json());
      },
      (error: Response) => {

      }
    )
  }

}
