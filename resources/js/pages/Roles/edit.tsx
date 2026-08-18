import { editRole, storeRole, updateRole } from '@/routes';
import { Input } from '@/components/ui/input';
import { Form, Head } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { useState } from 'react';

interface Role {
    id: number;
    name: string;
    slug: string;
}

interface EditRoleProps {
    role: Role;
}

export default function EditRole({ role }: EditRoleProps) {
    const [roleName, setRoleName] = useState(role.name);
    return (
        <>
            <Head title="Add New Role" />

            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <Form {...updateRole(role.id)}>
                    {({ processing, errors }) => (
                        <>
                            <div className="mb-4">
                                <label htmlFor="name">Role Name</label>

                                <Input
                                    id="name"
                                    name="name"
                                    value={roleName}
                                    onChange={(e) =>
                                        setRoleName(e.target.value)
                                    }
                                />

                                {errors.name && (
                                    <p className="text-sm text-red-500">
                                        {errors.name}
                                    </p>
                                )}
                            </div>

                            <Button type="submit" disabled={processing}>
                                {processing ? 'Saving...' : 'Update Role'}
                            </Button>
                        </>
                    )}
                </Form>
            </div>
        </>
    );
}

EditRole.layout = {
    breadcrumbs: [
        {
            title: 'Edit Role',
            // href: editRole(id),
        },
    ],
};
