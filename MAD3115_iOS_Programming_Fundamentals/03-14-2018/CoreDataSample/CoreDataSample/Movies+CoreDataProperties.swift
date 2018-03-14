//
//  Movies+CoreDataProperties.swift
//  CoreDataSample
//
//  Created by MacStudent on 2018-03-14.
//  Copyright © 2018 MacStudent. All rights reserved.
//
//

import Foundation
import CoreData


extension Movies {

    @nonobjc public class func fetchRequest() -> NSFetchRequest<Movies> {
        return NSFetchRequest<Movies>(entityName: "Movies")
    }

    @NSManaged public var year: String?
    @NSManaged public var name: String?
    @NSManaged public var seen: Bool
    
    

}
