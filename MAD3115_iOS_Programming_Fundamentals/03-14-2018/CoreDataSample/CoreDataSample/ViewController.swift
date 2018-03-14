//
//  ViewController.swift
//  CoreDataSample
//
//  Created by MacStudent on 2018-03-14.
//  Copyright © 2018 MacStudent. All rights reserved.
//

import UIKit
import CoreData

class ViewController: UITableViewController {

    
    
    //create a data source
   // var movies = ["Black Panther","Avengers: Infinity War","Shape of the Water","Padmaavat","Thugs of Hindonston","Bahuballi 2"];
    
    //create context
    let myContext = (UIApplication.shared.delegate as! AppDelegate).persistentContainer.viewContext;
    var movies = [Movies]();
    
    
    func saveData(){
        print("Saving Data");
        do{
            try myContext.save();
            
        }catch{
            print("Error in savinf data: \(error)");
        }
        
    }
    
    func loadData(){
        print("Loading Data");
        let request : NSFetchRequest<Movies> = Movies.fetchRequest();
        
        do{
            movies = try myContext.fetch(request);
        }catch{
            print("Error in savinf data: \(error)");
        }
    }
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
        let path = FileManager.default.urls(for:.documentDirectory,in:.userDomainMask);
        print(path);
        
        loadData();
        
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    
    //TableView related functions
    override func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        
        //Tell ios how many rows you want in your table
        return movies.count;
    }

    //Tell iOS what each cells looks like
   override func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCell(withIdentifier: "myCell",for: indexPath);
        
        //put some text in each row
        cell.textLabel?.text = movies[indexPath.row].name;
        cell.detailTextLabel?.text = String(movies[indexPath.row].seen);
        return cell;
    }
    
    //Select an item in a tableView
    override func tableView(_ tableView: UITableView, didSelectRowAt indexPath: IndexPath) {
        
        print("Index ", indexPath.row," Value ", movies[indexPath.row]);
        let m = movies[indexPath.row];
        if(m.seen == true){
            m.seen = false;
        }else{
            m.seen = true;
        }
        self.saveData();
        tableView.reloadData();
    }
    
    //Delete an item in a tableView
    override func tableView(_ tableView: UITableView, commit editingStyle: UITableViewCellEditingStyle, forRowAt indexPath: IndexPath) {
        
        //Get the delete popup and delete the item you select
        if (editingStyle == .delete){
            print("Going to delete item ",movies[indexPath.row].name!);
            
            // delete from the database (first delete and save the new Object to the database)
            self.myContext.delete(movies[indexPath.row]);
            self.saveData();
            
            // delete from the array
            movies.remove(at: indexPath.row);
            
            //UI: delete from the tableView
            tableView.deleteRows(at: [indexPath], with: .automatic);
        }
    }
    
    
    @IBAction func clickOnBarButtonItem(_ sender: UIBarButtonItem) {
        
        let alertBox = UIAlertController(title: "Alert Message", message: "hello", preferredStyle: .alert);
        
        alertBox.addTextField();
        
        let okButton = UIAlertAction(title: "OK", style: .default, handler: {
            
            action in
            
            let item = alertBox.textFields?[0].text;

            
            //create a new movie object
            let movies = Movies(context: self.myContext);
            
            // set the movie object's properties
            movies.name  = item;
            movies.year = "2018-03-14";
            movies.seen = false;
            
            // add the array tot ableview
            //self.myContext.save(movies);
            self.movies.append(movies);
            
            
            // save the movie object
            self.saveData();
            
            self.tableView.reloadData();
            
            print(item!);
            
        });
        alertBox.addAction(okButton);
        
        let cancelButton = UIAlertAction(title: "Cancel", style: .default, handler: nil);
        alertBox.addAction(cancelButton);
        
        present(alertBox,animated: true);
        
    }
}


