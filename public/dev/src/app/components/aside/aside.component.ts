import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '../../services/authentication/authentication.service';
import { HttpClientService } from '../../services/httpClient/httpClient.service';
import { Subscription } from 'rxjs';

@Component({
  moduleId: module.id,
  selector: 'app-aside',
  templateUrl: './aside.component.html'
})
export class AsideComponent implements OnInit {

  private roles: string[] = [];
  private _httpClientSubscription: Subscription;

  constructor(private httpClientService: HttpClientService, private authenticationService: AuthenticationService) {
    this._httpClientSubscription = this.httpClientService.httpClient$.subscribe(
      status => {
        console.log("%c Navigation", "background: green; color: white");
        console.log(status);
        
        if (status) {
          this.roles = this.authenticationService.authenticateRole.map(function (o) {
            return o.name;
          });
        } else {
          this.roles = [];
        }

        console.log(this.roles);
        console.log("%c ----------", "background: green; color: white");
      }
    )
  }

  ngOnInit() {
  }

  checkRole(roleName: string) {
    for(let i = 0; i < this.roles.length; i++) {
      if(this.roles[i] == roleName)
        return true;
    }
    return false;
  }

}
