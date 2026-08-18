import { Head, Link } from '@inertiajs/react';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import { roles, addRole, editRole } from '@/routes';
import { Button } from '@/components/ui/button';

interface Role {
    id: number;
    name: string;
    slug: string;
}

interface RolesProps {
    roles: Role[];
}

export default function Roles({ roles }: RolesProps) {
    return (
        <>
            <Head title="Roles List" />

            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <Link href={addRole()}>
                    <Button variant="default" className="mb-4">
                        Add New Role
                    </Button>
                </Link>
                <Table>
                    <TableCaption>List of all roles</TableCaption>

                    <TableHeader>
                        <TableRow>
                            <TableHead className="w-[100px]">ID</TableHead>

                            <TableHead>Role Name</TableHead>
                            <TableHead>Action</TableHead>
                        </TableRow>
                    </TableHeader>

                    <TableBody>
                        {roles.map((role) => (
                            <TableRow key={role.id}>
                                <TableCell className="font-medium">
                                    {role.id}
                                </TableCell>

                                <TableCell>{role.name}</TableCell>
                                <TableCell>
                                    <Link href={editRole(role.id)}>
                                        <Button
                                            variant="secondary"
                                            className="bg-amber-500 hover:bg-amber-400"
                                        >
                                            Edit
                                        </Button>
                                    </Link>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </div>
        </>
    );
}

Roles.layout = {
    breadcrumbs: [
        {
            title: 'Roles List',
            href: roles(),
        },
    ],
};
